const now = new Date();
const shortDate = new Intl.DateTimeFormat("ru", { dateStyle: "short" }).format(now);

String.prototype.replaceAt = function (index, replacement) {
  return this.substring(0, index) + replacement + this.substring(index + replacement.length);
}

function getRandom(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min; //Максимум не включается, минимум включается
}

function displayFileName() {
  var fileInput = document.getElementById('fileInput');
  var label = document.getElementById('fileName');
  label.textContent = fileInput.files[0].name;
}





function sendData(formId) {
  if ($(`#${formId} .switch`).hasClass('disabled')) {
    $(`#${formId} .switch`).removeClass('disabled').addClass('enabled');

    let dots = '.';
    let dotsCount = 3;
    let target = getRandom(5, 20);

    console.log(`target: ${target}`);
    for (let i = 0; i <= target; i++) {
      setTimeout(() => {
        if (i == target) {
          $(`#${formId} .switch`).text('Выкл')
          return;
        }
        else if (i % dotsCount == 0) {
          dots = '.';
        }
        else dots += '.';
        $(`#${formId} .switch`).text(`Запуск${dots}`)
        console.log(i)
      }, i * 500)
    }


  } else {
    $(`#${formId} .switch`).removeClass('enabled').addClass('disabled');

    $(`#${formId} .switch`).text('Вкл')
  }

  var formData = $('#' + formId).serialize();
  $.post('core/changeState.php', formData);
}