# 🚀 YDooM Booking System

A modern **property visit booking platform** built with Laravel, FullCalendar, and Stripe.
Users can explore places, schedule visits, and complete payments seamlessly.

---

## ✨ Features

* 🏠 Browse available places
* 📅 Interactive calendar booking (FullCalendar)
* 💳 Secure payments with Stripe
* 🔐 Authentication system (Laravel Breeze)
* 🎨 Modern UI with Tailwind CSS
* ⚡ Real-time event updates
* 🟢 Visit status management (pending / confirmed)

---



## 🛠️ Tech Stack

* **Backend:** Laravel
* **Frontend:** Blade + Tailwind CSS
* **Calendar:** FullCalendar.js
* **Payments:** Stripe API
* **Auth:** Laravel Breeze

---

## ⚙️ Installation

```bash
git clone https://github.com/youssefelkhafif/SmartPropertyBooking.git
cd ydoom-booking

composer install
npm install

cp .env.example .env
php artisan key:generate
```

---

## 🔑 Setup

Add your Stripe keys in `.env`:

```env
STRIPE_KEY=your_key
STRIPE_SECRET=your_secret
```

---

## 🗄️ Database

```bash
php artisan migrate
```

(Optional: reset everything)

```bash
php artisan migrate:fresh --seed
```

---

## ▶️ Run the App

```bash
php artisan serve
npm run dev
```

Visit:

```
not available
```

---

## 🔄 How It Works

1. User registers & logs in
2. Browses available places
3. Clicks **Book**
4. Selects time on calendar
5. Creates visit (pending)
6. Completes payment via Stripe
7. Visit becomes **confirmed ✅**

---

## 📂 Project Structure

```
app/
 ├── Models/
 ├── Http/Controllers/
resources/
 ├── views/
 ├── js/
routes/
 ├── web.php
```

---

## 📌 Future Improvements

* ⭐ Ratings & reviews
* 💬 Notifications system
* 📱 Mobile optimization
* 🧾 Booking history
* 🧠 Admin dashboard

---

## 👨‍💻 Author

**YDooM (Youssef  ElKhafif)**
🚀 Full Stack Developer

---

## 📜 License

This project is open-source and available under the MIT License.
