$(document).ready((function(){$("#submit_btn").click((function(){var t=$("input[name=name]").val(),e=$("input[name=email]").val(),a=$("textarea[name=message]").val(),o=!0;return""==t&&($("input[name=name]").css("border-color","#e41919"),o=!1),""==e&&($("input[name=email]").css("border-color","#e41919"),o=!1),""==a&&($("textarea[name=message]").css("border-color","#e41919"),o=!1),o&&(post_data={userName:t,userEmail:e,userMessage:a},$.post("contact_me.php",post_data,(function(t){"error"==t.type?output='<div class="error">'+t.text+"</div>":(output='<div class="success">'+t.text+"</div>",$("#contact_form input").val(""),$("#contact_form textarea").val("")),$("#result").hide().html(output).slideDown()}),"json")),!1})),$("#contact_form input, #contact_form textarea").keyup((function(){$("#contact_form input, #contact_form textarea").css("border-color",""),$("#result").slideUp()}))}));
//# sourceMappingURL=contact.c1bac40b.js.map
