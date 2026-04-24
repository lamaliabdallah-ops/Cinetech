    // document.getElementById('toggleTheme').addEventListener('click', () => {
    //     document.body.classList.toggle('dark-mode');
    // });


console.log("toto")
 // le travaillle de mourtalla 
    
const apiKey = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0ZmRjNjgwYTk1ODlkM2U4NzM5MzQ0NzViOWNmYzBhZSIsIm5iZiI6MTc3NjY3MDQ0MS45MzkwMDAxLCJzdWIiOiI2OWU1ZDZlOWMwNTI4MDkwYjI4NGY1NDEiLCJzY29wZXMiOlsiYXBpX3JlYWQiXSwidmVyc2lvbiI6MX0.REkvyOFSWugb7-TqtNGorgtPUqWZFQh0SQ8_NWN05hM';


//  pagination remplie par getDataContact
// let pagination = [];
// let current_page = 1;
// const pagination_per_page = 2;

// function totNumPages() {
//   return Math.ceil(pagination.length / pagination_per_page);
// }

// function prevPage() {
//   if (current_page > 1) {
//     current_page--;
//     change(current_page);
//   }
// }
// function nextPage() {
//   if (current_page < totNumPages()) {
//     current_page++;
//     change(current_page);
//   }
// }

// function change(page) {
//     let btn_next = document.getElementById('btn_next');
//     let btn_prev = document.getElementById('btn_prev');
//     let listing_table = document.getElementById('film'); 
//     let page_span = document.getElementById('page');

//     if (page < 1) page = 1;
//     if (page > totNumPages()) page = totNumPages();

//     listing_table.innerHTML = '';

//     // affiche les contacts de la page courante
//     let debut = (page - 1) * pagination_per_page;
//     var fin = page * pagination_per_page;
//     for (var i = debut; i < fin && i < pagination.length; i++) {
//         listing_table.innerHTML +=
//             '<tr>' +
//                 '<td>' + pagination[i].firstName + '</td>' +
//                 '<td>' + pagination[i].lastName + '</td>' +
//                 '<td>' + pagination[i].email + '</td>' +
//                 '<td>' + pagination[i].telephone + '</td>' +
//             '</tr>';
//     }

//     if (page_span) page_span.innerHTML = page + ' / ' + totNumPages();
//         if (btn_prev) {
//             if (page == 1) {
//                 btn_prev.style.visibility = 'hidden';
//             } else {
//                 btn_prev.style.visibility = 'visible';
//             }
//         }

//         if (btn_next) {
//             if (page == totNumPages()) {
//                 btn_next.style.visibility = 'hidden';
//             } else {
//                 btn_next.style.visibility = 'visible';
//             }
//         }
//     }

    export async function getData() {
        const movie = "fight club"
        const url = `https://api.themoviedb.org/3/search/movie?include_adult=false&language=en-US&page=3&query=${movie}`;
        
        const options = {
            method: 'GET',
            headers: {
                accept: 'application/json',
                Authorization: `Bearer ${apiKey}`         
            }
        };

        try {
            const response = await fetch(url, options);
            
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const result = await response.json();
            console.log(result);
            
            result.results.forEach(element => {
                let divFilm = document.getElementById('film')
                let card = document.createElement('div')
                let newTitle = document.createElement('h3')
                let newDescription = document.createElement('p')
                let newDate = document.createElement('p')
                let newPopularity = document.createElement('p')
                let newImg = document.createElement('img')

                newTitle.textContent = element.original_title;
                newDescription.textContent = element.overview;
                newDate.textContent = element.release_date;
                newPopularity.textContent = element.popularity + " %";

                if (element.poster_path === null) {
                    newImg.src = "image/imageParDefaut.webp" ;
                }else{
                    newImg.src = "https://image.tmdb.org/t/p/original/" + element.poster_path;
                }



                
                newImg.className = "w-full h-80 object-cover rounded-lg";
                newTitle.className = "text-2xl font-bold mt-3";
                newDescription.className = "text-sm text-gray-600 mt-2";
                newDate.className = "text-xs text-gray-400";
                newPopularity.className = "text-xs text-blue-500 font-semibold";
                card.className = "p-5 border rounded-xl shadow-md w-64 flex flex-col";


                console.log(card,'card')

                card.appendChild(newImg);
                card.appendChild(newTitle);
                card.appendChild(newDescription);
                card.appendChild(newDate);
                card.appendChild(newPopularity);
                divFilm.appendChild(card);

                const rootContainer = document.getElementById('root')
                rootContainer.appendChild(divFilm);
            });
                        console.log(result);
        } catch (error) {
            console.error(error.message);
        }
    }
    // boutons pagination

// })


 // le travaillle de mourtalla code 
