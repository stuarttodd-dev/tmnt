<?php

namespace App\Turtles\Actions;

class GetEventLogsAction
{
    /**
     * @return array
     */
    public function __invoke(array $turtles): array
    {
        $eventsGroupedByTurtle = collect($turtles)->filter(function ($turtle) {
            return !empty($turtle->eventLogs);
        })->map(function ($turtle) {
            return $turtle->eventLogs;
        });

        $eventLogs = [];
        if (!empty($eventsGroupedByTurtle)) {
            foreach ($eventsGroupedByTurtle as $turtleLogs) {

                if (empty($turtleLogs)) {
                    continue;
                }

                foreach ($turtleLogs as $key => $turtleLog) {
                    $eventLogs[$key] = $turtleLog;
                }
            }
        }

        $limit = 40;
        if (count($eventLogs) > $limit) {
            $difference = count($eventLogs) - $limit;
            foreach (range(1, $difference) as $pop) {
                array_shift($eventLogs);
            }
        }

        return $eventLogs;
    }
}
