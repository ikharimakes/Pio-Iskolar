function fetchDetails(key) {
    let search = new FormData();
        search.append('find', key);
    fetch('details.php', 
    {
        body: search,
        method: "post"
    })
    .then(response => response.json())
    .then(data => {
        //grab modal

        //clear modal content

        //inject modal content
    })
}

function fetchAnnouncements(key) {
    fetch('display.php')
    .then(response => response.json())
    .then(data => {
        //grab modal

        //clear modal content

        //inject modal content
    })
}


