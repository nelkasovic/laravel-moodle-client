<?php

namespace Wimando\LaravelMoodle\Entities;

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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Course
     */
    public function setId(int $id): Course
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return Course
     */
    public function setShortName(string $shortName): Course
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     * @return Course
     */
    public function setCategoryId(int $categoryId): Course
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return Course
     */
    public function setFullName(string $fullName): Course
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdNumber(): int
    {
        return $this->idNumber;
    }

    /**
     * @param int $idNumber
     * @return Course
     */
    public function setIdNumber(int $idNumber): Course
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Course
     */
    public function setSummary(string $summary): Course
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * @return int
     */
    public function getSummaryFormat(): int
    {
        return $this->summaryFormat;
    }

    /**
     * @param int $summaryFormat
     * @return Course
     */
    public function setSummaryFormat(int $summaryFormat): Course
    {
        $this->summaryFormat = $summaryFormat;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return Course
     */
    public function setFormat(string $format): Course
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return int
     */
    public function getShowGrades(): int
    {
        return $this->showGrades;
    }

    /**
     * @param int $showGrades
     * @return Course
     */
    public function setShowGrades(int $showGrades): Course
    {
        $this->showGrades = $showGrades;

        return $this;
    }

    /**
     * @return int
     */
    public function getNewsItems(): int
    {
        return $this->newsItems;
    }

    /**
     * @param int $newsItems
     * @return Course
     */
    public function setNewsItems(int $newsItems): Course
    {
        $this->newsItems = $newsItems;

        return $this;
    }

    /**
     * @return int
     */
    public function getStartDate(): int
    {
        return $this->startDate;
    }

    /**
     * @param int $startDate
     * @return Course
     */
    public function setStartDate(int $startDate): Course
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getEndDate(): int
    {
        return $this->endDate;
    }

    /**
     * @param int $endDate
     * @return Course
     */
    public function setEndDate(int $endDate): Course
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumSections(): int
    {
        return $this->numSections;
    }

    /**
     * @param int $numSections
     * @return Course
     */
    public function setNumSections(int $numSections): Course
    {
        $this->numSections = $numSections;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxBytes(): int
    {
        return $this->maxBytes;
    }

    /**
     * @param int $maxBytes
     * @return Course
     */
    public function setMaxBytes(int $maxBytes): Course
    {
        $this->maxBytes = $maxBytes;

        return $this;
    }

    /**
     * @return int
     */
    public function getShowReports(): int
    {
        return $this->showReports;
    }

    /**
     * @param int $showReports
     * @return Course
     */
    public function setShowReports(int $showReports): Course
    {
        $this->showReports = $showReports;

        return $this;
    }

    /**
     * @return int
     */
    public function getVisible(): int
    {
        return $this->visible;
    }

    /**
     * @param int $visible
     * @return Course
     */
    public function setVisible(int $visible): Course
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * @return int
     */
    public function getGroupMode(): int
    {
        return $this->groupMode;
    }

    /**
     * @param int $groupMode
     * @return Course
     */
    public function setGroupMode(int $groupMode): Course
    {
        $this->groupMode = $groupMode;

        return $this;
    }

    /**
     * @return int
     */
    public function getGroupModeForce(): int
    {
        return $this->groupModeForce;
    }

    /**
     * @param int $groupModeForce
     * @return Course
     */
    public function setGroupModeForce(int $groupModeForce): Course
    {
        $this->groupModeForce = $groupModeForce;

        return $this;
    }

    /**
     * @return int
     */
    public function getDefaultGroupingId(): int
    {
        return $this->defaultGroupingId;
    }

    /**
     * @param int $defaultGroupingId
     * @return Course
     */
    public function setDefaultGroupingId(int $defaultGroupingId): Course
    {
        $this->defaultGroupingId = $defaultGroupingId;

        return $this;
    }

    /**
     * @return int
     */
    public function getEnableCompletion(): int
    {
        return $this->enableCompletion;
    }

    /**
     * @param int $enableCompletion
     * @return Course
     */
    public function setEnableCompletion(int $enableCompletion): Course
    {
        $this->enableCompletion = $enableCompletion;

        return $this;
    }

    /**
     * @return int
     */
    public function getCompletionNotify(): int
    {
        return $this->completionNotify;
    }

    /**
     * @param int $completionNotify
     * @return Course
     */
    public function setCompletionNotify(int $completionNotify): Course
    {
        $this->completionNotify = $completionNotify;

        return $this;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     * @return Course
     */
    public function setLang(string $lang): Course
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * @return string
     */
    public function getForceTheme(): string
    {
        return $this->forceTheme;
    }

    /**
     * @param string $forceTheme
     * @return Course
     */
    public function setForceTheme(string $forceTheme): Course
    {
        $this->forceTheme = $forceTheme;

        return $this;
    }

    /**
     * @return array
     */
    public function getCourseFormatOptions(): array
    {
        return $this->courseFormatOptions;
    }

    /**
     * @param array $courseFormatOptions
     * @return Course
     */
    public function setCourseFormatOptions(array $courseFormatOptions): Course
    {
        $this->courseFormatOptions = $courseFormatOptions;

        return $this;
    }

}
