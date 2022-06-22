$(document).ready(function() {
    $(document).on("click","#login_checkbox",function(e){
      e.preventDefault();
      var form=$("#form").serialize(); // funkcja w jquery ktora robi formularz do odpowiedniego formatu ktory mozna wyslac ajaxem
      $("#ajax-loader").show(); // tutaj pokazuje ikonke ładowania, zeby user wiedzial ze wykonuje sie zapytanie
      $.ajax({
      type: "POST",
      method: "POST",
      data: form,
      url: "/ajax/rejestracja.ajax.php",
      success: function(msg){
      $("#ajax-loader").hide(); // chowa ikonke ladowania
      $("#msg").html(msg); // wyswietla komunikat ze skryptu rejestracja.ajax.php, np. nie wiem, ze poprawnie zapisano albo ze "nie wypelniles XX pola"
      },
                                error: function (xhr, ajaxOptions, thrownError) {
                                $("#ajax-loader").hide(); // chowa ikonke ladowania gdy blad
         $("#msg").html("<div class=\"alert alert-danger\">Błąd. Spróbuj ponownie. Kod błędu: " + xhr.status+" - "+xhr.responseText +"</div>"); // wyswietla error gdy np zerwie polaczenie czy cos
          }
    });
      return false; //w jquery przy metodzie "click" po prostu dziala to w ten sposob ze nie wykonuje faktycznie formularza, czyli nie przeladowuje strony itd. - bo bez tego by ci i wyslalo formularz ajaxem i przeladowalo stronę bo przegladarka domyslnie wykonuje formularz tam gdzie jest wpisane w action=""
      });
    
    
    });