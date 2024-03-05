function ddelete(productId) {
    var confirmation = confirm("Bạn có chắc muốn xóa sản phẩm có ID " + productId + " không?");
    if (confirmation) {
    
        document.getElementById('id').value = productId;
        document.getElementById('form-delete').submit();
    }
}
function getid(productid){
    document.getElementById('id1').value=productid;
}