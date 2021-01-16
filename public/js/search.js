const searchField = document.querySelector('input[placeholder="Wyszukaj..."]');
const searchButton = document.querySelector('.fas');
const projectContainer = document.querySelector("#content");

const my = projectContainer.getElementsByClassName("my-project");

searchField.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searchProjects();
    }
});

searchButton.addEventListener("click", searchProjects, false);

function searchProjects() {
    let option = "all";
    if (my.length > 0)
        option = "my";

    const data = {search: searchField.value}

    fetch("/search/"+option, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data),
    }).then(function (response) {
        return response.json();
    }).then(function (projects) {
        projectContainer.innerHTML = "";
        loadProjects(projects);
    });
}

function loadProjects(projects) {
    projects.forEach(project => {
        createProject(project);
    })
}

function createProject(project) {
    const template = document.querySelector("#project-template");

    const clone = template.content.cloneNode(true);

    const imageLink = clone.querySelector(".link-image");
    imageLink.href = `/project-details/${project.id}`;
    const image = clone.querySelector(".link-image img");
    image.src = `/public/uploads/${project.image}`;

    const title = clone.querySelector(".name a");
    title.href = `/project-details/${project.id}`;
    title.innerHTML = project.title;

    const category = clone.querySelector(".category");
    category.innerHTML = project.category;

    const locationAndDate = clone.querySelector(".location-and-date");
    if (locationAndDate != null)
        locationAndDate.innerHTML = project.location + " " + project.date;

    const deleteButton = clone.querySelector(".link-delete");
    if (deleteButton != null)
        deleteButton.href = `/delete-project/${project.id}`;

    projectContainer.appendChild(clone);
}