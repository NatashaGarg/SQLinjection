<?php
function depthFirstSearch($vertex, $list)
{
    if (!$vertex['visited']) {
        echo $vertex['letter']; // output on screen
        // mark vertex as visited
        $list[$vertex['vertex']]['visited'] = true;
        foreach ($vertex['neighbours'] as $neighbour) {
            // Watch neighbours, which were not visited yet
            if (!$list[$neighbour]['visited']) {
                // going through neighbour-vertexes
                $list = depthFirstSearch(
                    $list[$neighbour],
                    $list
                );
            }
        }
    }
     
    return $list;
}
 
function breadthFirstSearch($list)
{
    $queue = array();
    array_unshift($queue, $list[1]);
    $list[1]['visited'] = true;
     
    while (sizeof($queue)) {
        $vertex = array_pop($queue);
        echo $vertex['letter']; // output on screen
        foreach ($vertex['neighbours'] as $neighbour) {
            // Watch neighbours, which were not visited yet
            if (!$list[$neighbour]['visited']) {
                // mark vertex as visited
                $list[$neighbour]['visited'] = true;
                array_unshift($queue, $list[$neighbour]);
            }
        }
    }
}
?>
