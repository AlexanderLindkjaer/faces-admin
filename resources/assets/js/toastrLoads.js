 function toastrOnLoad(hash, message) {
    if (window.location.hash === hash) {
        toastr.success(message);
        history.pushState("", document.title, window.location.pathname);
    }
}




toastrOnLoad('#face-created', "Face created");
