<?php
function retornarVistaPrevia($nombre, $url)
{
    return ' <div
        class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
        data-wow-delay="0.2s"
    >
    <div class="service-item">
        <div class="service-img">
            <img
                src="img/pdf.png"
                class="img-fluid rounded-top w-100"
                alt=""
            />
            <div class="service-icon p-3">
                <i class="fa fa-download fa-2x"></i>
            </div>
        </div>
        <div class="service-content p-4">
            <div class="service-content-inner">
                <a href="#" class="d-inline-block h4 mb-4"
                    >' .
        $nombre .
        '</a
                >
                <p class="mb-4">

                </p>
                <a
                    class="btn btn-primary rounded-pill py-2 px-4"
                    href="' .
        $url .
        '"
                    >Ver Más</a
                >
            </div>
        </div>
    </div>
</div>';
}
