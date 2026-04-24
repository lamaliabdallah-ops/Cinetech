const accueil = document.getElementsByClassName("link-home2")
const films = document.getElementsByClassName("link-films")

const BASE_URL = "/Cinetech"
const routes = [
    { path : BASE_URL + "/", file : "./Pages/Home.js" },
    { path : BASE_URL + "/films", file: "./Pages/films.js"}
    
]

const router = async() =>{
    const currentPath = location.pathname
    let match = null;
    for (let i= 0; i < routes.length;i++){
        const route = routes[i];

        if (currentPath === route.path || currentPath === route.path + "/"){
            match =route;  
            break;
        }
        console.log(currentPath, route.path,'yoyoyo')
    } 
    const appContainer = document.getElementById("root")

    if ( match!== null){
        try {
            const module = await import(match.file)
            const render = module.default

            appContainer.innerHTML = render();
        } catch (error){
            appContainer.innerHTML ="<h1>Erreur de chargement</h1>" 
        }
    } else {
        appContainer.innerHTML = "<h1>404</h1>><p>Page introuvable</p>"
    }
}
window.addEventListener("popstate", router);

// Exécution au chargement initial
document.addEventListener("DOMContentLoaded", router);