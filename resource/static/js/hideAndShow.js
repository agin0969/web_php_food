function confirmDelete(tmp) {
    var result = confirm("Bạn có chắc chắn muốn xóa không?");
    if (result) {
        document.getElementById(tmp).submit();
    }
}