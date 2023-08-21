<?php
require '../Layout.php';
?>

<nav aria-label="breadcrumb " class="pt-3 d-flex justify-content-center align-items-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Purchase History</li>
    </ol>
</nav>

<div class="row vw-100">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <!-- Tab navs -->
                <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link fs-6 " id="v-tabs-pending-payment-tab" data-mdb-toggle="tab" href="#pending" role="tab" aria-controls="v-tabs-pending-payment" aria-selected="false">Confirmed</a>
                    <!-- <a class="nav-link fs-6 " id="v-tabs-paid-tab" data-mdb-toggle="tab" href="#paid" role="tab" aria-controls="v-tabs-paid" aria-selected="false">paid</a> -->
                    <!-- <a class="nav-link fs-6 " id="v-tabs-packaging-tab" data-mdb-toggle="tab" href="#packaging" role="tab" aria-controls="v-tabs-packaging" aria-selected="false">packaging</a> -->
                    <a class="nav-link fs-6 " id="v-tabs-shipping-tab" data-mdb-toggle="tab" href="#shipping" role="tab" aria-controls="v-tabs-shipping" aria-selected="false">Shipped</a>
                    <a class="nav-link fs-6 active" id="v-tabs-delivered-tab" data-mdb-toggle="tab" href="#delivered" role="tab" aria-controls="v-tabs-delivered" aria-selected="false">Delivered</a>
                    <a class="nav-link fs-6 " id="v-tabs-completed-tab" data-mdb-toggle="tab" href="#completed" role="tab" aria-controls="v-tabs-completed" aria-selected="false">Closed</a>
                </div>
                <!-- Tab navs -->
            </div>

            <div class="col-9">
                <!-- Tab content -->
                <div class="tab-content" id="v-tabs-tabContent">
                    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="v-tabs-shipping-tab">
                        <!-- loop-->
                        <div class="card mt-2 mb-5">
                            <div class="card-header">
                                <div class="d-inline">
                                    <label for="" class="text-capitalize fs-5">order no.</label>
                                    <span class="ml-5 fw-bold fs-5">ADFBHU2345BH <i class="far fa-copy" onclick="copyToClipboard('${order.trackingNo}')" data-mdb-toggle="tooltip" title="Copy Tracking Number"></i></span>
                                </div>
                                <div class="float-end fs-5">
                                    Total Price RM 38.90
                                </div>
                            </div>
                            <div class="card-body " id="v-tabs-all">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div id="txt-product-name-size-color-material" class="fs-6"><i class="fas fa-gift"></i> Product name - size/color/material</div>
                                    <div id="txt-unit-price" class="fs-6">RM 34</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <small class="text-muted"><span id="txt-quantity">2</span> item(s)</small>
                                    <label>Order at 20/7/2023</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">Delivery Address</div>
                                    <div id="txt-delivery-address">3A-19-7, Arte S Condo, Jalan Bukit Gambire, 11700, Gelugor, Penang</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end mt-5">
                                    <button type="button" class="btn btn-primary btn-rounded ms-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Write review</button>
                                    <a href="../Payment/PaymentRead.php?orderId=" class="btn btn-secondary btn-rounded ms-2" type="button"><i class="fa-solid fa-dollar-sign me-2"></i>View Payment</a>
                                </div>
                            </div>
                        </div>
                        <!-- loop-->
                    </div>
                    <div class="tab-pane fade" id="packaging" role="tabpanel" aria-labelledby="v-tabs-packaging-tab">
                        <!-- js loop-->
                        <pre:forEach items="${orders}" var="order">
                            <pre:choose>
                                <pre:when test="${order.status == packaging}">
                                    <!-- js loop-->
                                    <div class="card mt-2 mb-5">
                                        <div class="card-header">
                                            <div class="d-inline">
                                                <label for="" class="text-uppercase">order no.</label>
                                                <span class="ml-5 fw-bold">${order.orderNo}</span>
                                            </div>
                                            <a class="float-end link-primary" data-mdb-toggle="tooltip" title="View Order Detail" href="Fo.OrderView.jsp?orderId=${order.orderId}">
                                                <i class="fas fa-angle-right fa-lg "></i>
                                            </a>
                                        </div>
                                        <div class="card-body " id="v-tabs-all">
                                            <p class="card-text">
                                                <i class="fas fa-shipping-fast"></i>
                                                <span>${order.courier.courierName}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order date: </label>
                                                <small class="">${order.createdDate}</small>
                                            </p>
                                            <p class="card-text">
                                                <i class="far fa-copy" onclick="copyToClipboard('${order.trackingNo}')" data-mdb-toggle="tooltip" title="Copy Tracking Number"></i>
                                                <label for="" class="text-capitalize">tracking no.: </label>
                                                <span id="${order.trackingNo}">${order.trackingNo}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order total price: </label>
                                                <small class="">RM
                                                    <fmt:formatNumber value="${order.price}" type="number" minFractionDigits="2" />
                                                </small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">${order.count} item(s)</small>
                                            </p>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                                                <a href="../Payment/Fo.PaymentView.jsp?orderId=${order.orderId}" class="btn btn-primary" type="button">view payment</a>
                                            </div>
                                        </div>
                                    </div>
                                </pre:when>
                            </pre:choose>
                        </pre:forEach>
                        <!-- js loop-->
                    </div>
                    <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="v-tabs-paid-tab">
                        <!-- js loop-->
                        <pre:forEach items="${orders}" var="order">
                            <pre:choose>
                                <pre:when test="${order.status == paid}">
                                    <!-- js loop-->
                                    <div class="card mt-2 mb-5">
                                        <div class="card-header">
                                            <div class="d-inline">
                                                <label for="" class="text-uppercase">order no.</label>
                                                <span class="ml-5 fw-bold">${order.orderNo}</span>
                                            </div>
                                            <a class="float-end link-primary" data-mdb-toggle="tooltip" title="View Order Detail" href="Fo.OrderView.jsp?orderId=${order.orderId}">
                                                <i class="fas fa-angle-right fa-lg "></i>
                                            </a>
                                        </div>
                                        <div class="card-body " id="v-tabs-all">
                                            <p class="card-text">
                                                <i class="fas fa-shipping-fast"></i>
                                                <span>${order.courier.courierName}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order date: </label>
                                                <small class="">${order.createdDate}</small>
                                            </p>
                                            <p class="card-text">
                                                <i class="far fa-copy" onclick="copyToClipboard('${order.trackingNo}')" data-mdb-toggle="tooltip" title="Copy Tracking Number"></i>
                                                <label for="" class="text-capitalize">tracking no.: </label>
                                                <span id="${order.trackingNo}">${order.trackingNo}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order total price: </label>
                                                <small class="">RM
                                                    <fmt:formatNumber value="${order.price}" type="number" minFractionDigits="2" />
                                                </small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">${order.count} item(s)</small>
                                            </p>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                                                <a href="../Payment/Fo.PaymentView.jsp?orderId=${order.orderId}" class="btn btn-primary" type="button">view payment</a>
                                            </div>
                                        </div>
                                    </div>
                                </pre:when>
                            </pre:choose>
                        </pre:forEach>
                        <!-- js loop-->
                    </div>
                    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="v-tabs-shipping-tab">
                        <!-- js loop-->
                        <pre:forEach items="${orders}" var="order">
                            <pre:choose>
                                <pre:when test="${order.status == shipping}">
                                    <!-- js loop-->
                                    <div class="card mt-2 mb-5">
                                        <div class="card-header">
                                            <div class="d-inline">
                                                <label for="" class="text-uppercase">order no.</label>
                                                <span class="ml-5 fw-bold">${order.orderNo}</span>
                                            </div>
                                            <a class="float-end link-primary" data-mdb-toggle="tooltip" title="View Order Detail" href="Fo.OrderView.jsp?orderId=${order.orderId}">
                                                <i class="fas fa-angle-right fa-lg "></i>
                                            </a>
                                        </div>
                                        <div class="card-body " id="v-tabs-all">
                                            <p class="card-text">
                                                <i class="fas fa-shipping-fast"></i>
                                                <span>${order.courier.courierName}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order date: </label>
                                                <small class="">${order.createdDate}</small>
                                            </p>
                                            <p class="card-text">
                                                <i class="far fa-copy" onclick="copyToClipboard('${order.trackingNo}')" data-mdb-toggle="tooltip" title="Copy Tracking Number"></i>
                                                <label for="" class="text-capitalize">tracking no.: </label>
                                                <span id="${order.trackingNo}">${order.trackingNo}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order total price: </label>
                                                <small class="">RM
                                                    <fmt:formatNumber value="${order.price}" type="number" minFractionDigits="2" />
                                                </small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">${order.count} item(s)</small>
                                            </p>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                                                <a href="../Payment/Fo.PaymentView.jsp?orderId=${order.orderId}" class="btn btn-primary" type="button">view payment</a>
                                            </div>
                                        </div>
                                    </div>
                                </pre:when>
                            </pre:choose>
                        </pre:forEach>
                        <!-- js loop-->
                    </div>
                    <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="v-tabs-delivered-tab">
                        <!-- js loop-->
                        <pre:forEach items="${orders}" var="order">
                            <pre:choose>
                                <pre:when test="${order.status == delivered}">
                                    <!-- js loop-->
                                    <div class="card mt-2 mb-5">
                                        <div class="card-header">
                                            <div class="d-inline">
                                                <label for="" class="text-uppercase">order no.</label>
                                                <span class="ml-5 fw-bold">${order.orderNo}</span>
                                            </div>
                                            <a class="float-end link-primary" data-mdb-toggle="tooltip" title="View Order Detail" href="Fo.OrderView.jsp?orderId=${order.orderId}">
                                                <i class="fas fa-angle-right fa-lg "></i>
                                            </a>
                                        </div>
                                        <div class="card-body " id="v-tabs-all">
                                            <p class="card-text">
                                                <i class="fas fa-shipping-fast"></i>
                                                <span>${order.courier.courierName}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order date: </label>
                                                <small class="">${order.createdDate}</small>
                                            </p>
                                            <p class="card-text">
                                                <i class="far fa-copy" onclick="copyToClipboard('${order.trackingNo}')" data-mdb-toggle="tooltip" title="Copy Tracking Number"></i>
                                                <label for="" class="text-capitalize">tracking no.: </label>
                                                <span id="${order.trackingNo}">${order.trackingNo}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order total price: </label>
                                                <small class="">RM
                                                    <fmt:formatNumber value="${order.price}" type="number" minFractionDigits="2" />
                                                </small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">${order.count} item(s)</small>
                                            </p>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                                                <a href="../Payment/Fo.PaymentView.jsp?orderId=${order.orderId}" class="btn btn-primary" type="button">view payment</a>
                                            </div>
                                        </div>
                                    </div>
                                </pre:when>
                            </pre:choose>
                        </pre:forEach>
                        <!-- js loop-->
                    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="v-tabs-completed-tab">
                        <!-- js loop-->
                        <pre:forEach items="${orders}" var="order">
                            <pre:choose>
                                <pre:when test="${order.status == completed}">
                                    <!-- js loop-->
                                    <div class="card mt-2 mb-5">
                                        <div class="card-header">
                                            <div class="d-inline">
                                                <label for="" class="text-uppercase">order no.</label>
                                                <span class="ml-5 fw-bold">${order.orderNo}</span>
                                            </div>
                                            <a class="float-end link-primary" data-mdb-toggle="tooltip" title="View Order Detail" href="Fo.OrderView.jsp?orderId=${order.orderId}">
                                                <i class="fas fa-angle-right fa-lg "></i>
                                            </a>
                                        </div>
                                        <div class="card-body " id="v-tabs-all">
                                            <p class="card-text">
                                                <i class="fas fa-shipping-fast"></i>
                                                <span>${order.courier.courierName}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order date: </label>
                                                <small class="">${order.createdDate}</small>
                                            </p>
                                            <p class="card-text">
                                                <i class="far fa-copy" onclick="copyToClipboard('${order.trackingNo}')" data-mdb-toggle="tooltip" title="Copy Tracking Number"></i>
                                                <label for="" class="text-capitalize">tracking no.: </label>
                                                <span id="${order.trackingNo}">${order.trackingNo}</span>
                                            </p>
                                            <p class="card-text float-end">
                                                <label for="" class="text-capitalize">order total price: </label>
                                                <small class="">RM
                                                    <fmt:formatNumber value="${order.price}" type="number" minFractionDigits="2" />
                                                </small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">${order.count} item(s)</small>
                                            </p>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                                                <a href="../Payment/Fo.PaymentView.jsp?orderId=${order.orderId}" class="btn btn-primary" type="button">view payment</a>
                                            </div>
                                        </div>
                                    </div>
                                </pre:when>
                            </pre:choose>
                        </pre:forEach>
                        <!-- js loop-->
                    </div>
                    <!-- Tab content -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="POST" id="form-review-create needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Write Review <span class="text-danger">*</span></h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-outline">
                        <textarea id="txt-review" class="form-control" required rows="4"></textarea>
                        <div class="invalid-feedback">Required</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <!-- submit button not linking to js -->
                    <button type="submit" class="btn btn-primary">Post review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require '../Footer.php';
?>
<script src="../../../Script/FrontOffice/Order/OrderSummary.js"></script>