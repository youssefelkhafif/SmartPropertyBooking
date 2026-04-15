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

// 🔥 GET place_id FROM URL
function getPlaceIdFromURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get('place_id');
}

document.addEventListener('DOMContentLoaded', () => {

    const calendarEl = document.getElementById('calendar');
    if (!calendarEl) return;

    calendar = new Calendar(calendarEl, {
        plugins: [timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        selectable: true,

        // ✅ SIMPLE + RELIABLE
        events: '/visits',

        eventDataTransform(event) {
            // 🔥 filter here instead
            if (currentFilter !== 'all' && event.title.toLowerCase() !== currentFilter) {
                return null;
            }
            return event;
        },

        // ➕ CREATE VISIT
        select(info) {

            const placeId = getPlaceIdFromURL();

            if (!placeId) {
                alert('❌ No place selected! Click "View" first.');
                return;
            }

            fetch('/visits', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    start_time: info.startStr,
                    end_time: info.endStr,
                    place_id: placeId
                })
            })
            .then(() => calendar.refetchEvents())
            .catch(err => console.error('Create error:', err));
        },

        // 🎯 CLICK EVENT
        eventClick(info) {
            selectedVisitId = info.event.id;
            selectedStatus = info.event.title.toLowerCase();

            openModal();
        }
    });

    calendar.render();
});


// 🔍 FILTER
window.filterStatus = function (status) {
    currentFilter = status;
    if (calendar) calendar.refetchEvents();
};


// 🧱 MODAL
window.openModal = function () {

    const modal = document.getElementById('actionModal');
    const payBtn = document.getElementById('payBtn');
    const text = document.getElementById('modalText');

    if (!modal) return;

    modal.classList.remove('hidden');

    if (selectedStatus === 'pending') {
        text.innerText = "You can pay or delete this visit.";
        payBtn.classList.remove('hidden');
    } else {
        text.innerText = "This visit is confirmed. You can delete it.";
        payBtn.classList.add('hidden');
    }
};

window.closeModal = function () {
    document.getElementById('actionModal')?.classList.add('hidden');
};


// 💳 PAY
document.getElementById('payBtn')?.addEventListener('click', () => {
    if (!selectedVisitId) return;
    window.location.href = `/checkout/${selectedVisitId}`;
});


// 🗑 DELETE
document.getElementById('deleteBtn')?.addEventListener('click', () => {

    if (!selectedVisitId) return;

    fetch(`/visits/${selectedVisitId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(() => {
        closeModal();
        calendar.refetchEvents();
    })
    .catch(err => console.error('Delete error:', err));
});