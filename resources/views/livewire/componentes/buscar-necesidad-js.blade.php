
<div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    
    <script type="text/javascript">
    (function(document) {
        'buscador';
    
        var LightTableFilter = (function(Arr) {
    
          var _input;
    
          function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
              Arr.forEach.call(table.tBodies, function(tbody) {
                Arr.forEach.call(tbody.rows, _filter);
              });
            });
          }
    
          function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
          }
    
          return {
            init: function() {
              var inputs = document.getElementsByClassName('light-table-filter');
              Arr.forEach.call(inputs, function(input) {
                input.oninput = _onInputEvent;
              });
            }
          };
        })(Array.prototype);
    
        document.addEventListener('readystatechange', function() {
          if (document.readyState === 'complete') {
            LightTableFilter.init();
          }
        });
    
    })(document);
    </script>
    
</div>