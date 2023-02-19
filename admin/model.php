<div class="modal" id="model_question">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm câu hỏi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="classify" value="">
                <div class="form-group">
                    <label class="form-label" for="textQuestion">Câu hỏi</label>
                    <textarea class="form-control" id="txtQuestion" rows="2" placeholder="Câu hỏi"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="textOptionA">Câu A</label>
                    <textarea class="form-control" id="txtOptionA" rows="1" placeholder="Câu a"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="textOptionB">Câu B</label>
                    <textarea class="form-control" id="txtOptionB" rows="1" placeholder="Câu b"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="textOptionC">Câu C</label>
                    <textarea class="form-control" id="txtOptionC" rows="1" placeholder="Câu c"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="textOptionD">Câu D</label>
                    <textarea class="form-control" id="txtOptionD" rows="1" placeholder="Câu d"></textarea>
                </div>
                </br>
                <div class="form-group">
                    <label class="form-label" for="textOptionD">Đáp án đúng</label>
                    <div class="row">
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="rdOptionA">
                            <label class="form-check-label" for="rdOptionA">Đáp án A</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="rdOptionB">
                            <label class="form-check-label" for="rdOptionB">Đáp án B</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="rdOptionC">
                            <label class="form-check-label" for="rdOptionC">Đáp án C</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="rdOptionD">
                            <label class="form-check-label" for="rdOptionD">Đáp án D</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_submit">Xác nhận</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_close">Thoát</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    
</script>