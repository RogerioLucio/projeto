<div class="container">
      <div class="row" style="padding-right:2% 0% %0 5%;">
  
        <div class="col-sm-9 col-sm-offset-3 col-md-12  main">
   
          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>

              <?php 

              $linha = '';
              $variable = '';
                  echo "<tbody>";
                foreach ($variable as $teste) {

                      if($linha){
                        echo "<tr>";
                      }
                        echo "<td>" . $teste . "</td>";

                      if($linha){
                        echo "/<tr>";
                      }
                }
                echo "</tbody>";
               ?> 
            </table>
          </div>
        </div>
      </div>
    </div>