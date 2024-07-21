const feedbackForm = $(".feedback-form");
const resultTable = $(".result-table");
const errorBlock = $(".errors");

const focusedClass = "focused";
const errorInputClass = "error-input";

var reg = new Array();

reg['name'] = /^[a-zA-Zа-яА-ЯёЁ/ /,-]+$/i;
reg['address'] = /^[a-zA-Zа-яА-ЯёЁ0-9/ //./,-]+$/i;
reg['tel'] = /^[0-9()+-]+$/i;
reg['email'] = /^[a-z0-9]+(?:[\.-]?[a-z0-9]+)*@[a-z0-9]+([-]?[a-z0-9]+)*[\.-]?[a-z0-9]+([-]?[a-z0-9]+)*([\.-]?[a-z]{2,})*(\.[a-z]{2,5})+$/i;

let feedbackCount = 0;

$("#phone").mask("+9(999)999-99-99");

feedbackForm.find(".form__inputs").find("input").each(function () {
    $(this).bind("focus", function (e) {
        $(this).closest("label").addClass(focusedClass);
    });
    $(this).bind("blur", function (e) {
        if ($(this).val() != "")
            return;
        
        $(this).parent("label").removeClass(focusedClass);
    });
});

$(feedbackForm).submit(function (e) { 
    e.preventDefault();

    clearErrors();

    let checkResult = checkData();

    if (checkResult[0]["status"] == false)
    {
        $(errorBlock).css("display", "block");

        checkResult[0]["errors"].forEach(error => {
            let errorDiv = `<div class="error">${error}</div>`;
            $(".errors").append(errorDiv);
        });

        return;
    }

    let data = $(this).serializeArray();

    jQuery.each(data, function (i, item) {
        item.value = item.value.trim();
    });

    $.ajax({
        url: "/admin/handler/addFeedback.php",
        type: "post",
        datatype: "json",
        data: data,
        success: function (data) {
            let parseData = JSON.parse(data);

            if (parseData.length < feedbackCount)
                return;

            let result = "";

            for (let i = feedbackCount; i < parseData.length; i++)
                result += getTableRow(parseData[i]);
            
            feedbackCount = parseData.length;
            $(resultTable).css("display", "block")
            $(resultTable).find("table").append(result);
        }
    });
    
});

function checkData() {
    let errors = new Array();

    let FIO = $("#FIO");
    let address = $("#address");
    let phone = $("#phone");
    let email = $("#email");

    if (FIO.val().length < 4){
        errors.push("Длина имени должна быть не менее 4-х символов");
    }
    if (reg['name'].test(FIO.val()) == false) {
        errors.push("Имя должно содержать только символы русского и англиского языков");
        FIO.addClass(errorInputClass);
    }

    if (address.val().length > 0){
        if (reg['address'].test(address.val()) == false){
            errors.push("Адрес не должен содержать спец. символов");
            address.addClass(errorInputClass);
        }
    }

    if (reg['tel'].test(phone.val()) == false){
        errors.push("Номер телефона может сожержать только цифры, а так же знаки: (, ), -, +");
        phone.addClass(errorInputClass);
    }

    if (reg['email'].test(email.val()) == false){
        errors.push("Почта содержит запрещённые символы. Пример: example@mail.ru");
        email.addClass(errorInputClass);
    }
    
    let result = [{ "status": true }
    ];

    if (errors.length > 0){
        result = [ {
        "status": false,
        "errors": errors }
        ];
    }

    return result;
}

function clearErrors() {  
    $(errorBlock).css("display", "none");
    $(errorBlock).html("");

    $(feedbackForm).find("input").removeClass(errorInputClass);
}

function getTableRow(item) { 
    return `<tr>
                <td>${item.ID}</td>
                <td>${item.FIO}</td>
                <td>${item.Address}</td>
                <td>${item.Phone}</td>
                <td>${item.Email}</td>
            </tr>
            `;
}