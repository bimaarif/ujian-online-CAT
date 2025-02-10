let soal2 = document.getElementsByClassName('soal2');
let btnPrev = document.getElementById('previous');
let btnNext = document.getElementById('next');
let btnEnd = document.getElementById('end');
let nmr = document.getElementById('no_soal');
let nmrSoal = document.getElementsByClassName('no-soal');
let navUser = document.getElementById('nav_user');
let navUjian = document.getElementById('nav_ujian');
let btnOut = document.getElementById('timeOut');

let index = 0;

tampilSoal(index);

btnNext.onclick = () => {
    tampilSoal(index += 1);
    nmr.innerText = index + 1;
}

btnPrev.onclick = () => {
    nmr.innerText = index;
    tampilSoal(index -= 1);
}

function pilihSoal(no) {
    tampilSoal(index = no - 1);
    nmr.innerText = no;
}

function tampilSoal(index) {

    if (index === 0) {
        btnPrev.style.display = "none";
    } else {
        btnPrev.style.display = "block";
    }

    if (index === (soal2.length - 1)) {
        btnNext.style.display = "none";
        btnEnd.removeAttribute('hidden');
    } else {
        btnNext.style.display = "block";
        btnEnd.setAttribute('hidden', true);
    }

    for (let i = 0; i < soal2.length; i++) {
        soal2[i].style.display = "none";
    }

    soal2[index].style.display = "block";
}

function jawab(no) {
    nmrSoal[no - 1].className = nmrSoal[no - 1].className.replace("btn btn-outline-dark", "btn btn-success text-white");
}

navUser.classList.add('visually-hidden');
navUjian.classList.remove('visually-hidden');

let timerUjian = setInterval(countDown, 1000);

function countDown() {
    let curTime = document.getElementById('sisa');
    let arrTime = curTime.innerText.split(/[:]+/);
    let hour = arrTime[0];
    let min = arrTime[1];
    let sec = cekSecond(arrTime[2] - 1);

    if (sec == 59) {
        min = min - 1;

        if (min < 0 && min >= 0) {
            min = "0" + min;
        }

        if (min < 0 && hour > 0) {
            min = 59;
        }

        if (min == 59 && sec == 59 && hour > 0) {
            hour = hour - 1;
        }
    }

    // jika waktu habis

    if (min < 0 && hour == 0) {
        clearInterval(timerUjian);
        curTime.innerText = "HABIS";
        curTime.classList.add('blink');
        setTimeout(() => {
            btnOut.click();
        }, 3000);
        return
    }

    return curTime.innerText = hour + ':' + min + ':' + sec;
}

function cekSecond(sec) {
    if (sec < 10 && sec >= 0) {
        sec = "0" + sec;
    }

    if (sec < 0) {
        sec = "59";
    }

    return sec;
}

