<?php

class Schedule extends BaseModel
{
    use AccessorTrait;
    protected int $id_schedule;

    public function __construct(
        protected string $week_day = '',
        protected ?int $opened = null,
        protected ?int $closed = null,
        protected ?int $happy_start = null,
        protected ?int $happy_end = null
    )
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        try {
            $sql = 'SELECT * FROM `schedules`;';
            $stmt = $this->db->query($sql);
            $schedulesList = $stmt->fetchAll();
            return $schedulesList;
        } catch (Exception) {
            throw new Exception('Méthode getAll de la classe Schedule défectueuse');
        }
    }

    public function update(): void
    {
        try {
            $sql = 'UPDATE `schedules` SET `id_schedule` = :id_schedule, `week_day` = :week_day, `opened` = :opened, `closed` = :closed, `happy_start` = :happy_start, `happy_end` = :happy_end
                    WHERE `schedules`.`id_schedule` = :id_schedule;';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id_schedule', $this->id_schedule, PDO::PARAM_INT);
            $stmt->bindValue(':week_day', $this->week_day, PDO::PARAM_STR);
            $stmt->bindValue(':opened', $this->opened, PDO::PARAM_INT);
            $stmt->bindValue(':closed', $this->closed, PDO::PARAM_INT);
            $stmt->bindValue(':happy_start', $this->happy_start, PDO::PARAM_INT);
            $stmt->bindValue(':happy_end', $this->happy_end, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception) {
            throw new Exception('Méthode update de la classe Schedule défectueuse');
        }
    }
}