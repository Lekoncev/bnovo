async function getPosts() {
    let res = await fetch('http://localhost/Backend/index/posts');
    let posts = await res.json();

    posts.forEach((post) => {
        document.querySelector('.post-list').innerHTML += '<div class="card">\n' +
            '                <div class="card-body">\n' +
            '                    <p class="card-name">${post.name}</p>\n' +
            '                    <p class="card-surname">${post.surname}</p>\n' +
            '                    <p class="card-lastname">${post.lastname}</p>\n' +
            '                    <p class="card-number">${post.number}</p>\n' +
            '                    <p class="card-email">${post.email}</p>\n' +
            '                    <p class="card-country">${post.country}</p>\n' +
            '                </div>\n' +
            '            </div>'

    })
}
async function addPost() {
    const name = document.getElementById('name').value,
        surname = document.getElementById('surname').value,
        lastname = document.getElementById('lastname').value,
        number = document.getElementById('number').value,
        email = document.getElementById('email').value,
        country = document.getElementById('country').value;

    let formData = new FormData();
    formData.append('name', name);
    formData.append('surname', surname);
    formData.append('lastname', lastname);
    formData.append('number', number);
    formData.append('email', email);
    formData.append('country', country);

    const res = await fetch('http://localhost/Backend/index/posts' ,{
        method: "POST",
        body:  formData
    });

    const data = await res.json();

}