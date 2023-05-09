<template>
  <div class="q-pa-md">
    <h5>Users Activity</h5>
    <q-table :data="userActivities" :columns="userActivityColumns" />

    <h5>Tasks Activity</h5>
    <q-table :data="taskActivities" :columns="taskActivityColumns" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      userActivities: [
        { user: "John Doe", activity: "Completed Task 1" },
        { user: "Jane Doe", activity: "Assigned Task 2 to Bob Smith" },
        { user: "Bob Smith", activity: "Started Task 3" },
      ],
      taskActivities: [
        { task: "Task 1", activity: "Completed by John Doe" },
        { task: "Task 2", activity: "Assigned to Bob Smith by Jane Doe" },
        { task: "Task 3", activity: "Started by Bob Smith" },
      ],
      userActivityColumns: [
        { name: "user", label: "User", align: "left", field: "user" },
        { name: "activity", label: "Activity", align: "left", field: "activity" },
      ],
      taskActivityColumns: [
        { name: "task", label: "Task", align: "left", field: "task" },
        { name: "activity", label: "Activity", align: "left", field: "activity" },
      ],
    };
  },
};
</script>
