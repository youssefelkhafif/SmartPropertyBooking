import './bootstrap';

import { Calendar } from '@fullcalendar/core';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let calendar = null;
let selectedVisitId = null;
let selectedStatus = null;
let currentFilter = 'all';

document.addEventListener('DOMContentLoaded', () => {

    const calendarEl = document.getElementById('calendar');
    if (!calendarEl) return;

    calendar = new Calendar(calendarEl, {
        plugins: [timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        selectable: true,

        // 📊 EVENTS
        events(fetchInfo, successCallback) {
            fetch('/visits')
                .then(res => res.json())
                .then(data => {

                    if (currentFilter !== 'all') {
                        data = data.filter(v =>
                            v.title.toLowerCase() === currentFilter
                        );
                    }

                    successCallback(data);
                });
        },

        // ➕ CREATE
        select(info) {
            fetch('/visits', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    start_time: info.startStr,
                    end_time: info.endStr
                })
            }).then(() => calendar.refetchEvents());
        },

        // 🎯 CLICK
        eventClick(info) {
            selectedVisitId = info.event.id;
            selectedStatus = info.event.title.toLowerCase();

            openModal();
        }
    });

    calendar.render();
});


// FILTER
window.filterStatus = function(status) {
    currentFilter = status;
    if (calendar) calendar.refetchEvents();
};


// MODAL
window.openModal = function() {
    const modal = document.getElementById('actionModal');
    const payBtn = document.getElementById('payBtn');
    const text = document.getElementById('modalText');

    modal.classList.remove('hidden');

    if (selectedStatus === 'pending') {
        text.innerText = "You can pay or delete this visit.";
        payBtn.classList.remove('hidden');
    } else {
        text.innerText = "This visit is confirmed. You can delete it.";
        payBtn.classList.add('hidden');
    }
};

window.closeModal = function() {
    document.getElementById('actionModal').classList.add('hidden');
};


// 💳 PAY → GO TO PAYMENT PAGE
document.getElementById('payBtn')?.addEventListener('click', () => {
    window.location.href = `/checkout/${selectedVisitId}`;
});


// 🗑 DELETE
document.getElementById('deleteBtn')?.addEventListener('click', () => {

    fetch(`/visits/${selectedVisitId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    }).then(() => {
        closeModal();
        calendar.refetchEvents();
    });
});