const music = new Audio('Korol_i_SHut_-_Lesnik.mp3');

// create Array

const songs = [

  {
    id: '1',
    songName: 'On My Way <br> <div class="main-subname">Alan Walker</div>',
    poster: "Img/ImgSongs/1.jpg"
  },
  {
    id: '2',
    songName: 'Fade <br> <div class="main-subname">Alan Walker</div>',
    poster: "Img/ImgSongs/2.jpg"
  },
  {
    id: '3',
    songName: 'Lesnik <br> <div class="main-subname">Korol I Shut</div>',
    poster: "Img/ImgSongs/3.jpg"
  },
  {
    id: '4',
    songName: 'Kukla Kolduna <br> <div class="main-subname">Korol I Shut</div>',
    poster: "Img/ImgSongs/4.jpg"
  },
  {
    id: '5',
    songName: 'Megaverse <br> <div class="main-subname">Stray kids</div>',
    poster: "Img/ImgSongs/5.jpg"
  },
  {
    id: '6',
    songName: 'Smack That <br> <div class="main-subname">Akon</div>',
    poster: "Img/ImgSongs/6.jpg"
  },
  {
    id: '7',
    songName: 'Carica <br> <div class="main-subname">ANNA ASTI</div>',
    poster: "Img/ImgSongs/7.jpg"
  },
  {
    id: '8',
    songName: 'Thunder <br> <div class="main-subname">Imagine Dragons</div>',
    poster: "Img/ImgSongs/8.jpg"
  },
  {
    id: '9',
    songName: 'KAK MOMMY <br> <div class="main-subname">INSTASAMKA</div>',
    poster: "Img/ImgSongs/9.jpg"
  },
  {
    id: '10',
    songName: 'Molcha <br> <div class="main-subname">Kishlak</div>',
    poster: "Img/ImgSongs/10.jpg"
  },
  {
    id: '11',
    songName: 'Poker Face <br> <div class="main-subname">Ledi Gaga</div>',
    poster: "Img/ImgSongs/11.jpg"
  },
  {
    id: '12',
    songName: 'Rampampam <br> <div class="main-subname">Minelli</div>',
    poster: "Img/ImgSongs/12.jpg"
  }


]

// Array.from(document.getElementsByClassName('main-listelemet')).forEach((element, i) => {
//   element.getElementsByTagName('img')[0].src = songs[i].poster;
//   element.getElementsByTagName('h3')[0].innerHTML = songs[i].songName;
// })

Array.from(document.getElementsByClassName('song-element')).forEach((element, i) => {
  element.getElementsByTagName('img')[0].src = songs[i].poster;
  element.getElementsByTagName('h3')[0].innerHTML = songs[i].songName;
})

let masteryPlay = document.getElementById('masteryPlay');
let wave = document.getElementsByClassName('main-wave')[0];

masteryPlay.addEventListener('click', () => {
  if (music.paused || music.currentTime <= 0) {
    music.play();
    masteryPlay.classList.remove('bi-play-fill');
    masteryPlay.classList.add('bi-pause-fill');
    wave.classList.add('active');
  } else {
    music.pause();
    masteryPlay.classList.add('bi-play-fill');
    masteryPlay.classList.remove('bi-pause-fill');
    wave.classList.remove('active');
  }
})


const makeAllPlays = () => {
  Array.from(document.getElementsByClassName('main-play')).forEach((element) => {
    element.classList.add('bi-play-circle-fill');
    element.classList.remove('bi-pause-circle-fill');
  })
}

let index = 0;

let poster_master_play = document.getElementById('poster_master_play');
let title = document.getElementById('title');

Array.from(document.getElementsByClassName('main-play')).forEach((element) => {
  element.addEventListener('click', (e) => {
    index = e.target.id;
    makeAllPlays();
    e.target.classList.remove('bi-play-circle-fill');
    e.target.classList.add('bi-pause-circle-fill');
    music.src = `Songs/${index}.mp3`;
    poster_master_play.src = `Img/ImgSongs/${index}.jpg`;
    music.play();
    let song_title = songs.filter((ele) => {
      return ele.id == index;
    })

    song_title.forEach(ele => {
      let { songName } = ele;
      title.innerHTML = songName;
    })
    masteryPlay.classList.remove('bi-play-fill');
    masteryPlay.classList.add('bi-pause-fill');
    wave.classList.add('active');
    // music.addEventListener('ended', () => {
    //   masteryPlay.classList.add('bi-play-fill');
    //   masteryPlay.classList.remove('bi-pause-fill');
    //   wave.classList.remove('active');
    // })
  })
})

let currentStart = document.getElementById('currentStart');
let currentEnd = document.getElementById('currentEnd');
let seek = document.getElementById('seek');
let seek_element = document.getElementById('seek_element');
let dot = document.getElementsByClassName('bar-dot')[0];

music.addEventListener('timeupdate', () => {
  let music_curr = music.currentTime;
  let music_dur = music.duration;

  let min = Math.floor(music_dur / 60);
  let sec = Math.floor(music_dur % 60);

  if (sec < 10) {
    sec = `0${sec}`
  }

  currentEnd.innerText = `${min}:${sec}`;

  let min1 = Math.floor(music_curr / 60);
  let sec1 = Math.floor(music_curr % 60);

  if (sec1 < 10) {
    se1c = `0${sec1}`
  }

  currentStart.innerText = `${min1}:${sec1}`;

  let progressbar = parseInt((music.currentTime / music.duration) * 100);
  seek.value = progressbar;
  let seekbar = seek.value;
  seek_element.style.width = `${seekbar}%`;
  dot.style.left = `${seekbar}%`;
})

seek.addEventListener('change', () => {
  music.currentTime = seek.value * music.duration / 100;
})

music.addEventListener('ended', () => {
  masteryPlay.classList.add('bi-pause-fill');
  wave.classList.add('active');
  index++;
  music.src = `Songs/${index}.mp3`;
  poster_master_play.src = `Img/ImgSongs/${index}.jpg`;
  music.play();
  let song_title = songs.filter((ele) => {
    return ele.id == index;
  })

  song_title.forEach(ele => {
    let { songName } = ele;
    title.innerHTML = songName;
  })
  makeAllPlays();
  document.getElementsByClassName('main-play')[index - 1].classList.remove('bi-play-circle-fill');
  document.getElementsByClassName('main-play')[index - 1].classList.add('bi-pause-circle-fill');
})

let vol_icon = document.getElementById('vol_icon');
let vol = document.getElementById('vol');
let vol_dot = document.getElementById('vol_dot');
let vol_element = document.getElementsByClassName('vol-element')[0];

vol.addEventListener('change', () => {
  if (vol.value == 0) {
    vol_icon.classList.remove('bi-volume-down-fill');
    vol_icon.classList.add('bi-volume-mute-fill');
    vol_icon.classList.remove('bi-volume-up-fill');
  }
  if (vol.value > 0) {
    vol_icon.classList.add('bi-volume-down-fill');
    vol_icon.classList.remove('bi-volume-mute-fill');
    vol_icon.classList.remove('bi-volume-up-fill');
  }
  if (vol.value > 50) {
    vol_icon.classList.remove('bi-volume-down-fill');
    vol_icon.classList.remove('bi-volume-mute-fill');
    vol_icon.classList.add('bi-volume-up-fill');
  }

  let vol_a = vol.value;
  vol_element.style.width = `${vol_a}%`;
  vol_dot.style.left = `${vol_a}%`;
  music.volume = vol_a / 100;
})


let back = document.getElementById('back');
let next = document.getElementById('next');

back.addEventListener('click', () => {
  index -= 1;
  if (index < 1) {
    index = Array.from(document.getElementsByClassName('song-element')).length;
  }
  music.src = `Songs/${index}.mp3`;
  poster_master_play.src = `Img/ImgSongs/${index}.jpg`;
  music.play();
  let song_title = songs.filter((ele) => {
    return ele.id == index;
  })

  song_title.forEach(ele => {
    let { songName } = ele;
    title.innerHTML = songName;
  })
  makeAllPlays()

  document.getElementById(`${index}`).classList.remove('bi-play-fill');
  document.getElementById(`${index}`).classList.add('bi-pause-fill');
})

next.addEventListener('click', () => {
  index -= 0;
  index += 1;
  if (index > Array.from(document.getElementsByClassName('song-element')).length) {
    index = 1;
  }
  music.src = `Songs/${index}.mp3`;
  poster_master_play.src = `Img/ImgSongs/${index}.jpg`;
  music.play();
  let song_title = songs.filter((ele) => {
    return ele.id == index;
  })

  song_title.forEach(ele => {
    let { songName } = ele;
    title.innerHTML = songName;
  })
  makeAllPlays()

  document.getElementById(`${index}`).classList.remove('bi-play-fill');
  document.getElementById(`${index}`).classList.add('bi-pause-fill');
})


let left_scroll = document.getElementById('left_scroll');
let right_scroll = document.getElementById('right_scroll');
let popular_song = document.getElementsByClassName('popular-song')[0];

left_scroll.addEventListener('click', () => {
  popular_song.scrollLeft -= 300;
})

right_scroll.addEventListener('click', () => {
  popular_song.scrollLeft += 300;
})