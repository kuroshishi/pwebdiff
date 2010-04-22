var	c = 0;
var	fo;

function init_mon() {
  fo = new Form.Observer( 'finp' , 1, f_change );
}

function f_change() {
// var	v = new Ajax.Request( 'qpd.php', { method: 'post', onSuccess: q_success, parameters: $('finp').serialize() } );
  var	v = new Ajax.Updater('res', 'qpd.php', {
              method: 'post',
              parameters: $('finp').serialize()
             } );

}

function q_success() {
  c = c + 1;
  res.innerHTML = "cut! " + c + '  ' + $('finp').serialize();
}

function clinps( fname ) {
  var		el = document.getElementById ( fname );

  el.clear();
}
