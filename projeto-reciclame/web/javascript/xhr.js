var xhr = new XMLHttpRequest();


xhr.onreadystatechange =function (){

    if(xhr.readyState == 4){
        console.log(xhr);
    }

}


xhr.open("GET","https://jsonplaceholder.typicode.com/posts");

xhr.send();