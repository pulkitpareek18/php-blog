const buttonRight = document.getElementById('scrollRight');
const buttonLeft = document.getElementById('scrollLeft');

let lastVideoIndex = document.getElementsByClassName("videos").length-1
firstVideo = document.getElementsByClassName("videos")[0]
lastVideo = document.getElementsByClassName("videos")[lastVideoIndex]

let initial_position = getOffset(firstVideo).left
let final_position = getOffset(lastVideo).left

// console.log(initial_position)
// console.log(final_position)


  function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
      left: rect.left + window.scrollX,
      top: rect.top + window.scrollY
    };
  }

  

buttonRight.onclick = function () {
   
     document.getElementById('playlist').scrollBy({
        top: 0,
        left: +700,
        behavior: 'smooth'
    })
};

buttonLeft.onclick = function () {
  
    document.getElementById('playlist').scrollBy({
        top: 0,
        left: -700,
        behavior: 'smooth'
    })
};


if($(window).width()-final_position<0){
    $("#scrollRight").css("display", "flex")
}
  


// Select the playlist element
const playlist = document.querySelector("#playlist");
// Select the left and right scroll buttons
const leftBtn = document.querySelector("#scrollLeft");
const rightBtn = document.querySelector("#scrollRight");

// Add event listener for scroll event on the playlist element
playlist.addEventListener("scroll", () => {
  // Check if the playlist has reached the end on the left side
  if (playlist.scrollLeft === 0) {
    leftBtn.style.display = "none";
  } else {
    leftBtn.style.display = "flex";
  }
  // Check if the playlist has reached the end on the right side
  if (playlist.scrollLeft === playlist.scrollWidth - playlist.clientWidth) {
    rightBtn.style.display = "none";
  } else {
    rightBtn.style.display = "flex";
  }
});





