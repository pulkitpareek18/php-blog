// getting all required elements
const wrapper = document.querySelector(".wrapper");
const searchWrapper = document.querySelector(".search-input");
const inputBox = searchWrapper.querySelector("input");
const suggBox = wrapper.querySelector(".autocom-box");
const icon = searchWrapper.querySelector(".icon");
let linkTag = searchWrapper.querySelector("a");
let webLink;

let homeUrl = "https://iblog.rf.gd/"

// Set up options for fuzzy search
const options = {
    shouldSort: true,
    tokenize: true,
    matchAllTokens: true,
    includeMatches: true,
    includeScore: true,
    useExtendedSearch: true,
    ignoreLocation: false,
    findAllMatches: false,    
    threshold: 0.4,
    location: 1,
    distance: 100,
    maxPatternLength: 32,
    minMatchCharLength: 1,
    ignoreLocation: true,
    keys: [
      { name: "title", weight: 1},
      { name: "slug", weight: 0.7 }
    ],
    ignoreFieldNorm: true,
    ignoreSpecialCharacters: false,
    ignorePunctuation: false,
    ignoreNumeric: false
  };

let searchOutput;

$(document).ready(function () {
    $.get(`${homeUrl}includes/search_backend.php`, {}, function(data) {
    searchOutput = JSON.parse(data);
})
});



// function to display search results
function displayResults(results) {
    suggBox.innerHTML = '';
    if (results.length > 0) {
      results.forEach((result) => {

      // create HTML element for each search result
      const resultItem = document.createElement('li');
      const urlItem = document.createElement('a');
      urlItem.href = `${homeUrl}play/${result.item.slug}`;
      urlItem.textContent = result.item.title;
      resultItem.appendChild(urlItem);
      suggBox.appendChild(resultItem);

      });
    } else {
        if(inputBox.value!=""){
      // if no results found, display "No results found" message
      const noResults = document.createElement('li');
      noResults.innerText = 'No results found';
      suggBox.appendChild(noResults);
    }
    }
  }
  

// if user presses any key and releases it
inputBox.onkeyup = (e) => {
  let userData = e.target.value; // user entered data
  // console.log(userData)
    let fuse = new Fuse(searchOutput, options);
    let result = fuse.search(userData);
    // result = result.sort((a, b) => b.score - a.score);
    // console.log(result);
    displayResults(result)

    if(userData != ""){
        wrapper.classList.add("active")
        searchWrapper.classList.add("active")
    }else{
        wrapper.classList.remove("active")
        searchWrapper.classList.remove("active")
    }

};


//Sidebar Open Close

$("#openSidebar").click(function(){
  $("#sidebar").css("width","60vw");
})

$("#closeSidebar").click(function(){
  $("#sidebar").css("width","0vw");
})

//Header Size CSS
const input = document.querySelector('.wrapper input');
const searchBox = document.querySelector('.searchBox');
const headerImage = document.querySelector('#nav img');
const openSidebar = document.getElementById('openSidebar');
  input.addEventListener('input', function() {
    if(window.innerWidth <= 820){
      if (input.value!="") {
        input.classList.add('navbarFull');
        searchBox.classList.add('navbarFull');
        headerImage.classList.add('hideHeaderIcons');
        openSidebar.classList.add('hideHeaderIcons');
      }else{
        input.classList.remove('navbarFull');
        searchBox.classList.remove('navbarFull');
        headerImage.classList.remove('hideHeaderIcons');
        openSidebar.classList.remove('hideHeaderIcons');
      }
    }
  });
