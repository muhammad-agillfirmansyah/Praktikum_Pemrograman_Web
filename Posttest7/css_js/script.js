// Tema gelap/terang dengan penyimpanan preferensi
const themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function () {
    document.body.classList.toggle('dark-mode');
    const isDarkMode = document.body.classList.contains('dark-mode');
    this.textContent = isDarkMode ? 'Light Mode' : 'Dark Mode';
    
    // Simpan preferensi tema di localStorage
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
});

// Muat preferensi tema dari localStorage
window.addEventListener('load', function () {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeToggleBtn.textContent = 'Light Mode';
    }
});

// Hamburger menu
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('hamburger').addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('active');
    });
});

// Tutup menu saat link diklik
document.querySelectorAll('.menu a').forEach(link => {
    link.addEventListener('click', function () {
        document.getElementById('menu').classList.remove('active');
    });
});

// Popup penawaran khusus
document.getElementById('popup-btn').addEventListener('click', function () {
    const popup = document.getElementById('popup');
    popup.style.display = 'flex';
    popup.classList.add('show'); // Animasi muncul
});

// Tutup popup dengan tombol 'x'
document.getElementById('close-btn').addEventListener('click', function () {
    const popup = document.getElementById('popup');
    popup.classList.remove('show'); // Animasi menghilang
    setTimeout(() => {
        popup.style.display = 'none';
    }, 300); // Waktu sinkron dengan animasi CSS
});

// Tutup popup dengan klik di luar
document.getElementById('popup').addEventListener('click', function (e) {
    if (e.target === this) {
        const popup = document.getElementById('popup');
        popup.classList.remove('show'); // Animasi menghilang
        setTimeout(() => {
            popup.style.display = 'none';
        }, 300); // Waktu sinkron dengan animasi CSS
    }
});
