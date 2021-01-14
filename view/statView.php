<?php
ob_start();
?>
          
   <h3 class="admtitle">Statistiques</h3>
        <table>
          <thead>
            <th>Numéro Question</th>
            <th>Question</th>
            <th>Réponse 1</th>
            <th>Réponse 2</th>
            <th>Réponse 3</th>
            <th>Réponse 4</th>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Comment vos dirigent s'engagent-ils en matières de qualités et de sécurité des aliments ?</td>
              <td>Ils font de leurs mieux et ne respectent pas toujours les règles</td>
              <td>Ils font de leurs mieux et ne respectent pas toujours les règles</td>
              <td>Ils font de leurs mieux et ne respectent pas toujours les règles</td>
              <td>Ils font de leurs mieux et ne respectent pas toujours les règles</td>
            </tr>
            <tr class="tableStats">
              <td>#</td>
              <td>#</td>
              <td class="progressStats"><div style="width: 15%;">15%</div></td>
              <td class="progressStats"><div style="width: 22%;">22%</div></td>
              <td class="progressStats"><div style="width: 34%;">34%</div></td>
              <td class="progressStats"><div style="width: 29%;">29%</div></td>
            </tr>
          </tbody>
        </table>

<?php $stats = ob_get_clean(); ?>