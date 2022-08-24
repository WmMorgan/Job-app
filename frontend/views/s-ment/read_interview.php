<?php

$data = $interview->findOne(['statament_id' => $model->id]);
$this->title = 'Set Interview S Ment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'S Ments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Interview';
?>

<h2>Intervyu soat <?= $data['interview_time'] ?>da belgilangan</h2>
<p><h3><u>Eslatma: <?= $data['note'] ?></u></h3></p>
