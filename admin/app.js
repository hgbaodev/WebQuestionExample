$("#btn_submit").click(function() {
  let classify = $("#classify").val();
  if (classify == '') {
    let question = $('#txtQuestion').val();
    let optionA = $('#txtOptionA').val();
    let optionB = $('#txtOptionB').val();
    let optionC = $('#txtOptionC').val();
    let optionD = $('#txtOptionD').val();
    let answer = $('#rdOptionA').is(':checked') ? 'A' : $('#rdOptionB').is(':checked') ? 'B' : $('#rdOptionC').is(':checked') ? 'C' : $('#rdOptionD').is(':checked') ? 'D' : "";

    if (question == "" || optionA == "" || optionB == "" || optionC == "" || optionD == "") {
      alert("Vui lòng điền đầy đủ câu hỏi và câu trả lời");
      return;
    }

    if (answer == "") {
      alert("Vui lòng chọn câu trả lời đúng");
      return;
    }
    $.ajax({
      url: 'add_question.php',
      type: 'post',
      data: {
        question: question,
        optionA: optionA,
        optionB: optionB,
        optionC: optionC,
        optionD: optionD,
        answer: answer
      },
      success: function(data) {
        alert(data);
        $('#txtQuestion').val('');
        $('#txtOptionA').val('');
        $('#txtOptionB').val('');
        $('#txtOptionC').val('');
        $('#txtOptionD').val('');
        $('#rdOptionA').prop("checked", false);
        $('#rdOptionB').prop("checked", false);
        $('#rdOptionC').prop("checked", false);
        $('#rdOptionD').prop("checked", false);
        loadQuestion();
      }
    })
  } else {
    let question = $('#txtQuestion').val();
    let optionA = $('#txtOptionA').val();
    let optionB = $('#txtOptionB').val();
    let optionC = $('#txtOptionC').val();
    let optionD = $('#txtOptionD').val();
    let answer = $('#rdOptionA').is(':checked') ? 'A' : $('#rdOptionB').is(':checked') ? 'B' : $('#rdOptionC').is(':checked') ? 'C' : $('#rdOptionD').is(':checked') ? 'D' : "";

    if (question == "" || optionA == "" || optionB == "" || optionC == "" || optionD == "") {
      alert("Vui lòng điền đầy đủ câu hỏi và câu trả lời");
      return;
    }

    if (answer == "") {
      alert("Vui lòng chọn câu trả lời đúng");
      return;
    }
    $.ajax({
      url: 'update_question.php',
      type: 'post',
      data: {
        id: classify,
        question: question,
        optionA: optionA,
        optionB: optionB,
        optionC: optionC,
        optionD: optionD,
        answer: answer
      },
      success: function(data) {
        loadQuestion();
        closeModal();
        setTimeout(function() {
          alert(data);
        }, 1);
      }
    })
  }

})

function closeModal() {
  var myModalEl = document.getElementById('model_question');
  var modal = bootstrap.Modal.getInstance(myModalEl)
  modal.hide();
}

$(document).on('click', "input[name='update']", function() {
  var bid = $(this).closest('tr').attr('id');
  $("#classify").val(bid);
  $("#btn_submit").show();
  getdetail(bid);
  $('#txtQuestion').attr('readonly', false);
  $('#txtOptionA').attr('readonly', false);
  $('#txtOptionB').attr('readonly', false);
  $('#txtOptionC').attr('readonly', false);
  $('#txtOptionD').attr('readonly', false);

  $(".form-check-input").prop("disabled", false);

  loadQuestion();
})

$(document).on('click', "input[name='view']", function() {
  var bid = $(this).closest('tr').attr('id');
  $("#btn_submit").hide();
  getdetail(bid);
  $('#txtQuestion').attr('readonly', true);
  $('#txtOptionA').attr('readonly', true);
  $('#txtOptionB').attr('readonly', true);
  $('#txtOptionC').attr('readonly', true);
  $('#txtOptionD').attr('readonly', true);

  $(".form-check-input").prop("disabled", true);
})

$(document).on('click', "input[name='delete']", function(){
  var bid = $(this).closest('tr').attr('id');
  if(confirm("Bạn có muốn xóa câu hỏi này?") == true){
    $.ajax({
      url: "delete_question.php",
      type: "post",
      data:{
        id: bid
      },
      success:function(data){
        alert(data);
        loadQuestion();
      }
    })
  }
})



// function loadQuestion() {
//   $.ajax({
//     url: "loadquestion.php",
//     type: "get",
//     success: function(data) {
//       $("#result_question").empty();
//       $("#result_question").append(data);
//     }
//   })
// }

function getdetail(id) {
  $.ajax({
    url: "detail.php",
    type: 'get',
    data: {
      id: id
    },
    success: function(data) {
      let result = JSON.parse(data);
      let question = result['question'];
      let optionA = result['option_a'];
      let optionB = result['option_b'];
      let optionC = result['option_c'];
      let optionD = result['option_d'];
      let answer = result['answer'];

      $('#txtQuestion').val(question);
      $('#txtOptionA').val(optionA);
      $('#txtOptionB').val(optionB);
      $('#txtOptionC').val(optionC);
      $('#txtOptionD').val(optionD);
      switch (answer) {
        case "A":
          $('#rdOptionA').prop("checked", true);
          break;
        case "B":
          $('#rdOptionB').prop("checked", true);
          break;
        case "C":
          $('#rdOptionC').prop("checked", true);
          break;
        case "D":
          $('#rdOptionD').prop("checked", true);
          break;
      }
    }
  })
}

$(document).ready(function() {
  loadSearchQuestion($("#search_question").val().trim());
});
var page = 1;

function loadSearchQuestion(content){
  $.ajax({
      url: "search.php",
      type: "get",
      data:{
        page: page,
        content: content
      },
      success:function(data){
      $("#result_question").empty();
      $("#result_question").append(data);
      }
  })
  loadPagination();

}


$("#search_question").on('input',function(){
  let search = $("#search_question").val();
  search.trim();
  loadSearchQuestion(search);
})

$(document).on('click', ".page-item",function(){
  var bid = $(this).closest('li').attr('id');
  page = bid;
  loadSearchQuestion($("#search_question").val().trim());
}) 

function loadPagination(){
  $.ajax({
    url: "pagination.php",
    type: "get",
    data: {
      content: $("#search_question").val().trim()
    },
    success:function(data){

        let pg = '';
        for(i = 1;i<=data;i++){
          pg += `<li id="${i}" class="page-item"><a class="page-link" href="#">${i}</a></li>`;
        }
        $("#pagination").empty();
        $("#pagination").append(pg);
      
    }
  });
}