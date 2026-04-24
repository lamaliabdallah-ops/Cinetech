import { getData } from "../showAllMovies"

    let btn_prev = document.getElementById('btn_prev');
    let btn_next = document.getElementById('btn_next');
    if (btn_prev) btn_prev.addEventListener('click', prevPage);
    if (btn_next) btn_next.addEventListener('click', nextPage);
    
    getData();
    const films = () => {
    return ` 
    <script defer src="../showAllMovies.js"></script>
    <h1 class="text-8xl font-bold text-center mb-5 mt-5">la Liste des films</h1>
    <div id="film" class="flex flex-wrap gap-6 p-8 bg-gray-100 justify-center">

    </div>
   
    <!-- <img src="image/imageParDefaut.webp" alt="" srcset=""> -->
      `
}

export default films