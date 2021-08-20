<?php

namespace Wimando\LaravelMoodle\Entities\Dto;

use Wimando\LaravelMoodle\Entities\Entity;

class Course extends Entity
{
    /**
     * Course ID
     */
    public int $id;

    /**
     * Short name of the course
     */
    public string $shortName;

    /**
     * ID of category to which course belongs to
     */
    public int $categoryId;

    /**
     * Full course name
     */
    public string $fullName;

    /**
     * Course ID
     */
    public int $idNumber;

    /**
     * Course description/summary
     */
    public string $summary;

    /**
     * Summary format (1 = HTML, 0 = MOODLE, 2 = PLAIN or 4 = MARKDOWN)
     */
    public int $summaryFormat;

    /**
     * Course format: weeks, topics, social, site, etc...
     */
    public string $format;

    /**
     * If grades are shown
     */
    public int $showGrades;

    /**
     * Number of recent items appearing on the course page
     */
    public int $newsItems;

    /**
     * Timestamp when the course start
     */
    public int $startDate;

    /**
     * Timestamp when the course end
     */
    public int $endDate;

    /**
     * Optional. Deprecated, use courseformatoptions. Number of weeks/topics
     */
    public int $numSections;

    /**
     * Optional. Largest size of file that can be uploaded into the course
     */
    public int $maxBytes;

    /**
     * Optional. Are activity report shown (yes = 1, no =0)
     */
    public int $showReports;

    /**
     * Optional. 1: available to student, 0:not available
     */
    public int $visible;

    /**
     * Optional. No group, separate, visible
     */
    public int $groupMode;

    /**
     * Optional. 1: yes, 0: no
     */
    public int $groupModeForce;

    /**
     * Optional. Default grouping id
     */
    public int $defaultGroupingId;

    /**
     * Optional. Enabled, control via completion and activity settings. Disbaled,
     */
    public int $enableCompletion;

    /**
     * Optional. 1: yes 0: no
     */
    public int $completionNotify;

    /**
     * Optional. Forced course language
     */
    public string $lang;

    /**
     * Optional. The name of the force theme
     */
    public string $forceTheme;

    /**
     * Optional. Additional options for particular course format
     */
    public array $courseFormatOptions = [];
}
