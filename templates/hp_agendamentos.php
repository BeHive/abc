  <div class="abc-container abc-padding-32" id="contact">
    <h3><?=$lang=='pt'?'Agendamento de Reunião':'Schedule a Meeting'?></h3>
    <form action="/reuniao" method="POST" onsubmit="return sendMessage()" id="abcReuniao">
      <input class="abc-input" type="text" placeholder="<?=$lang=='pt'?'Nome':'Name'?>" required name="name">
      <input class="abc-input abc-section" type="text" placeholder="Email" required name="email">
      <textarea rows=10 class="abc-input abc-section" style="resize:vertical" required name="body"></textarea>
      <button class="abc-btn abc-section" type="submit">
        <i class="fa fa-paper-plane"></i> <?=$lang=='pt'?'Enviar Mensagem':'Send Message'?>
      </button>
    </form>
  </div>
  
  
  
<script>
    function sendMessage(){
        var data = Ink.Dom.FormSerialize.serialize(Ink.s("#abcReuniao"));
        new Ink.Net.Ajax_1("/reuniao",{
            method: "POST",
            parameters: {'data':JSON.stringify(data)},
            onSuccess: function(xhrObj, req){
                Ink.s("#abcReuniao").parentElement.insertAdjacentHTML('beforebegin',
                '<div class="abc-padding abc-green">' + 
                '<span onclick="this.parentElement.style.display=\'none\'" class="abc-closebtn">'+
                '<i class="fa fa-remove"></i>'+
                '</span>'+
                '<h4><?=$lang=='pt'?'Mensagem enviada com sucesso':'Message sent'?></h4>'+
                '</div>'
                );
                
                
                
            },
            onFailure: function(xhrObj, req){
                Ink.s("#abcReuniao").parentElement.insertAdjacentHTML('beforebegin','<div class="abc-padding abc-green">' + 
                '<span onclick="this.parentElement.style.display=\'none\'" class="abc-closebtn">'+
                '<i class="fa fa-remove"></i>'+
                '</span>'+
                '<h4><?=$lang=='pt'?'Erro ao enviar a sua mensagem. Por favor tente novamente':'Error sending message. Please try again'?></h4>'+
                '</div>'
                );
            },
            timeout: 5
        });
        
        return false;
        
    }
</script>