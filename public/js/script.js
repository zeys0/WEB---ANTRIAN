function updateClock() {
    const now = new Date();

    const dateElement = document.getElementById("date");
    dateElement.textContent = now.toLocaleDateString();

    const timeElement = document.getElementById("time");
    timeElement.textContent = now.toLocaleTimeString();
}

// Memperbarui jam setiap detik
setInterval(updateClock, 1000);

// Memanggil fungsi updateClock untuk pertama kali
updateClock();


    

