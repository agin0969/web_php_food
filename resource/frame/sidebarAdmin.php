<link href="../resource/static/css/sidebarAdmin.css" rel="stylesheet"type="text/css">
<div class="bg-dark text-white sidebar-container" id="sidebar-wrapper">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-5 fw-semibold">WEFOOD</span>
    </a>
    <div class="sidebar-body">
        <ul class="sidebar-ul">
            <li>
                <button type="button" class="btn btn-sm product-mn" data-bs-toggle="collapse"
                    href="#collapseProduct" role="button" aria-expanded="false" aria-controls="collapseProduct">
                    Quản lí sản phẩm
                </button>
                <div class="collapse collapse-product" id="collapseProduct">
                    <ul>
                        <li><a href="">Danh sách sản phẩm</a></li>

                    </ul>
                </div>
            </li>
            <li>
                <button type="button" class="btn btn-sm product-mn" data-bs-toggle="collapse" href="#collapseUser"
                    role="button" aria-expanded="false" aria-controls="collapseUser">
                    Quản lí người dùng
                </button>
                <div class="collapse collapse-user" id="collapseUser">
                    <ul>
                        <li><a href="">Danh sách người dùng</a></li>

                    </ul>
                </div>
            </li>
            <li>
                <button type="button" class="btn btn-sm product-mn" data-bs-toggle="collapse" href="#collapseBill"
                    role="button" aria-expanded="false" aria-controls="collapseBill">
                    Quản lí hóa đơn
                </button>
                <div class="collapse collapse-bill" id="collapseBill">
                    <ul>
                        <li><a href="">
                            <span>Danh sách hóa đơn</span>
                        </a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button type="button" class="btn btn-sm product-mn mt-3" data-bs-toggle="collapse"
                    href="#account-collapse" role="button" aria-expanded="false" aria-controls="collapseAccount">
                    Account
                </button>
                <div class="collapse account-collapse" id="account-collapse">
                    <ul>
                        <li><a href="#">New...</a>
                        </li>
                        <li><a href="#">Profile</a>
                        </li>
                        <li><a href="#">Settings</a>
                        </li>
                        <li><a href="#">Sign
                                out</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>




</div>