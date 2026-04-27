const apiKey = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0ZmRjNjgwYTk1ODlkM2U4NzM5MzQ0NzViOWNmYzBhZSIsIm5iZiI6MTc3NjY3MDQ0MS45MzkwMDAxLCJzdWIiOiI2OWU1ZDZlOWMwNTI4MDkwYjI4NGY1NDEiLCJzY29wZXMiOlsiYXBpX3JlYWQiXSwidmVyc2lvbiI6MX0.REkvyOFSWugb7-TqtNGorgtPUqWZFQh0SQ8_NWN05hM';

async function getData() {
    if (!document.getElementById('film')) return;

    const movie = "fight%20club"
    let page = 1
    const url = `https://api.themoviedb.org/3/search/movie?include_adult=false&language=en-US&page=${page}&query=${movie}`;
    
    const options = {
        method: 'GET',
        headers: {
            accept: 'application/json',
            Authorization: `Bearer ${apiKey}`         
        }
    };

    try {
        const response = await fetch(url, options);
        if (!response.ok) throw new Error(`Response status: ${response.status}`);

        const result = await response.json();
        console.log(result);
        
        result.results.forEach(element => {
            let divFilm = document.getElementById('film')
            let card = document.createElement('a')
            let newTitle = document.createElement('h3')
            let newDescription = document.createElement('p')
            let newDate = document.createElement('p')
            let newPopularity = document.createElement('p')
            let newImg = document.createElement('img')

            newTitle.textContent = element.original_title;
            newDescription.textContent = element.overview;
            newDate.textContent = element.release_date;
            newPopularity.textContent = element.popularity + " %";
            card.href = `detail.html?movieId=${element.id}`;

            if (element.poster_path === null) {
                newImg.src = "image/imageParDefaut.webp";
            } else {
                newImg.src = "https://image.tmdb.org/t/p/original/" + element.poster_path;
            }

            newImg.className = "w-full h-80 object-cover rounded-lg";
            newTitle.className = "text-2xl font-bold mt-3";
            newDescription.className = "text-sm text-gray-600 mt-2";
            newDate.className = "text-xs text-gray-400";
            newPopularity.className = "text-xs text-blue-500 font-semibold";
            card.className = "p-5 border rounded-xl shadow-md w-64 flex flex-col";

            card.appendChild(newImg);
            card.appendChild(newTitle);
            card.appendChild(newDescription);
            card.appendChild(newDate);
            card.appendChild(newPopularity);
            divFilm.appendChild(card);
            document.body.appendChild(divFilm);
        });

        console.log(result);

    } catch (error) {
        console.error(error.message);
    }
}

let btn_prev = document.getElementById('btn_prev');
let btn_next = document.getElementById('btn_next');
if (btn_prev) btn_prev.addEventListener('click', prevPage);
if (btn_next) btn_next.addEventListener('click', nextPage);

getData();

async function getMovieDetail() {
    const params = new URLSearchParams(window.location.search);
    const movieId = params.get('movieId');

    if (!movieId) return;

    const url = `https://api.themoviedb.org/3/movie/${movieId}`;

    const options = {
        method: 'GET',
        headers: {
            accept: 'application/json',
            Authorization: `Bearer ${apiKey}`
        }
    };

    try {
        const response = await fetch(url, options);
        if (!response.ok) throw new Error(`Erreur: ${response.status}`);

        const movie = await response.json();
        console.log(movie);

        document.getElementById('title').textContent = movie.title;
        document.getElementById('overview').textContent = movie.overview;
        document.getElementById('date').textContent = movie.release_date;
        document.getElementById('note').textContent = movie.vote_average + ' %';

        if (movie.poster_path) {
            document.getElementById('poster').src = `https://image.tmdb.org/t/p/original/${movie.poster_path}`;
        } else {
            document.getElementById('poster').src = 'image/imageParDefaut.webp';
        }

        let coeur = document.getElementById('coeurDetail');
    coeur.onclick = function() {
        if (coeur.textContent == '🤍') {
            coeur.textContent = '❤️';
        } else {
            coeur.textContent = '🤍';
        }
    };

    } catch (error) {
        console.error(error.message);
    }
}

getMovieDetail();