<?php
    $title = 'Gestion des '.$tableName;

    ob_start();
?>
<h1><?= $title ?></h1>
<table>
    <thead>
        <tr>
            <?php
                foreach($properties as $propertie)
                {
                    if(str_starts_with($propertie->name,'id'))
                    {
                        ?>
                        <th>Sélection</th>
                        <?php
                    }
                    else
                    {
                        ?>
                        <th><?= $propertie->name ?></th>
                        <?php
                    }
                }
            ?>
            <th>Modifier</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 0; 
            foreach($data as $row)
            {
                ?>
                <tr>
                    <?php 
                        $c = 0;
                        foreach($properties as $propertie)
                        {
                            if($c = 0)
                            {
                                $display = '<input type="checkbox" name="'.$i.'" value="'.$row->{'get'.ucwords($propertie->name)}().'">';
                                $c ++;
                            }
                            elseif(is_bool($row->{'get'.ucwords($propertie->name)}()))
                            {
                                if($row->{'get'.ucwords($propertie->name)}()) $display = 'Oui';
                                else $display = 'Non';
                            }
                            else
                            {
                                $display = $row->{'get'.ucwords($propertie->name)}();
                            }
                            ?>
                            <td><?= $display ?></td>
                            <?php
                        }
                        $i ++;
                    ?>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>