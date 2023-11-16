// get ticket button -- php
const showButton = document.getElementById("show");
const closeButton = document.getElementById("close");
const ticket = document.getElementById("ticket");

showButton.addEventListener("click", () => {
    ticket.classList.add("active");
});

closeButton.addEventListener('click', () => {
    ticket.classList.remove("active");
});

// countdown
function updateCountdown() {
    const targetDate = new Date('2023-11-25 23:59:59');
    const currentDate = new Date();
    const timeRemaining = targetDate - currentDate;

    if (timeRemaining <= 0) {
        document.getElementById('days').textContent = '0';
        document.getElementById('hours').textContent = '0';
        document.getElementById('minutes').textContent = '0';
        document.getElementById('seconds').textContent = '0';
    } else {
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60) / 1000));

        document.getElementById('days').textContent = days;
        document.getElementById('hours').textContent = hours;
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;
    }
}

updateCountdown();

setInterval(updateCountdown, 1000);