if (queryParameters().success === "agent"){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'New Contestant added successfully!',
        showConfirmButton: false,
        timer: 3000
    });
    setTimeout(function(){
        let removePram = window.location.href;
        removePram = window.location.href.split("?")[0];
        window.location.assign(removePram);
    }, 1000);
}