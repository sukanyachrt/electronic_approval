<?php

include('./../manage/header.php');

?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        include("./../manage/navbar.php");
        ?>

        <?php

        if ($_SESSION['_role'] == 'student') {
            include('./../manage/sidebar.php');
        } else {
            include('./../manage/sidebar.php');
        }
        ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <br>
                                <h2>Creat signature</h2>
                                <hr>
                                <div id="canvasDiv"></div>
                                <br>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-danger" id="btnReset">Clear</button>
                                    <button type="button" class="btn btn-success" id="btnSave">Save</button>
                                </div>
                                <input type="hidden" id="signature" name="signature">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("./../manage/footer.php") ?>
        <!-- confrom ผลการแจ้งเตือน -->
        <div class="modal fade" id="modal-Alertdata">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">แจ้งเตือน</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="resultAlert"></p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">ตกลง</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./../manage/scripts.php") ?>

</body>

<script src="./../manage/changepage.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }

        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                // console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#btnReset").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        $(document).on('click', '#btnSave', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);


            $.ajax({
                url: "./../api/sign/data.php?v=uploadSignature",
                type: "POST",
                data: anchor,
                success: function(Res) {
                    if (Res.status) {
                        $('#resultAlert').text(`${Res.msg}`)
                        $('#modal-Alertdata').modal('show');
                       // alert(Res.msg)
                    }

                }
            });

            // $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })
</script>