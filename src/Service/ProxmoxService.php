<?php

namespace App\Service;

use Proxmox\Request;

class ProxmoxService
{
    private array $configure;


    public function __construct()
    {
        $this->configure = [
            'hostname' => '192.168.85.4',
            'username' => 'root',
            'password' => '123456789'
        ];

    }

    public function login(): void
    {
        Request::Login($this->configure);
    }

    public function getNodes()
    {
        $this->login();
        return Request::Request('/nodes', null, 'GET');
    }
    public function getContainers()
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc', null, 'GET');
    }
    public function getContainer($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/status/current', null, 'GET');
    }
    public function startContainer($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/status/start', null, 'POST');
    }
    public function stopContainer($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/status/stop', null, 'POST');
    }
    public function suspendContainer($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/status/suspend', null, 'POST');
    }
    public function resumeContainer($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/status/resume', null, 'POST');
    }
    public function shutdownContainer($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/status/shutdown', null, 'POST');
    }
    public function resetContainer($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/status/reset', null, 'POST');
    }
    public function deleteContainer($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid, null, 'DELETE');
    }
    public function createContainer($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc', $data, 'POST');
    }
    public function updateContainer($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/config', $data, 'PUT');
    }
    public function getContainerConfig($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/config', null, 'GET');
    }
    public function getContainerSnapshot($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot', null, 'GET');
    }
    public function createContainerSnapshot($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot', $data, 'POST');
    }
    public function getContainerSnapshotConfig($vmid, $snapname)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/'.$snapname.'/config', null, 'GET');
    }
    public function deleteContainerSnapshot($vmid, $snapname)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/'.$snapname, null, 'DELETE');
    }
    public function rollbackContainerSnapshot($vmid, $snapname)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/'.$snapname.'/rollback', null, 'POST');
    }
    public function getContainerSnapshotState($vmid, $snapname)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/'.$snapname.'/state', null, 'GET');
    }
    public function getContainerSnapshotConfigCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/config', null, 'GET');
    }
    public function updateContainerSnapshotConfigCurrent($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/config', $data, 'PUT');
    }
    public function getContainerSnapshotStateCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/state', null, 'GET');
    }
    public function getContainerSnapshotSchedule($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule', null, 'GET');
    }
    public function createContainerSnapshotSchedule($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule', $data, 'POST');
    }
    public function getContainerSnapshotScheduleConfig($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid, null, 'GET');
    }
    public function deleteContainerSnapshotSchedule($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid, null, 'DELETE');
    }
    public function updateContainerSnapshotSchedule($vmid, $schedid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid, $data, 'PUT');
    }
    public function getContainerSnapshotScheduleState($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/state', null, 'GET');
    }
    public function getContainerSnapshotScheduleNextRun($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/next', null, 'GET');
    }
    public function getContainerSnapshotScheduleConfigCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/config', null, 'GET');
    }
    public function updateContainerSnapshotScheduleConfigCurrent($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/config', $data, 'PUT');
    }
    public function getContainerSnapshotScheduleStateCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/state', null, 'GET');
    }
    public function getContainerSnapshotScheduleNextRunCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/next', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatus($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/status', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrent()
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/snapshot/schedule/status', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVm($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/status', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentBySched($schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/snapshot/schedule/'.$schedid.'/status', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSched($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRun($vmid, $schedid, $runid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid, null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunLog($vmid, $schedid, $runid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/log', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunState($vmid, $schedid, $runid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLog($vmid, $schedid, $runid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log', null, 'GET');
    }
public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntry($vmid, $schedid, $runid, $logid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid, null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryData($vmid, $schedid, $runid, $logid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLog($vmid, $schedid, $runid, $logid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntry($vmid, $schedid, $runid, $logid, $logentryid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid, null, 'GET');
    }

    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntryData($vmid, $schedid, $runid, $logid, $logentryid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid.'/data', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntryDataLog($vmid, $schedid, $runid, $logid, $logentryid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid.'/data/log', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntryDataLogEntry($vmid, $schedid, $runid, $logid, $logentryid, $logentrydataid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid, null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntryDataLogEntryData($vmid, $schedid, $runid, $logid, $logentryid, $logentrydataid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntryDataLogEntryDataLog($vmid, $schedid, $runid, $logid, $logentryid, $logentrydataid)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data/log', null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntryDataLogEntryDataLogEntry($vmid, $schedid, $runid, $logid, $logentryid, $logentrydataid, $logentrydata)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data/log/'.$logentrydata, null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntryDataLogEntryDataLogEntryData($vmid, $schedid, $runid, $logid, $logentryid, $logentrydataid, $logentrydata)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data/log/'.$logentrydata, null, 'GET');
    }
    public function getContainerSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLogEntryDataLogEntryDataLogEntryDataLog($vmid, $schedid, $runid, $logid, $logentryid, $logentrydataid, $logentrydata)
    {
        $this->login();
        return Request::Request('/nodes/pve/lxc/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data/log/'.$logentrydata.'/data/log', null, 'GET');
    }

    public function getQemu()
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu', null, 'GET');
    }
    public function getQemuConfig($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/config', null, 'GET');
    }
    public function getQemuStatus($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/current', null, 'GET');
    }
    public function startQemu($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/start', null, 'POST');
    }
    public function stopQemu($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/stop', null, 'POST');
    }
    public function resetQemu($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/reset', null, 'POST');
    }
    public function shutdownQemu($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/shutdown', null, 'POST');
    }
    public function suspendQemu($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/suspend', null, 'POST');
    }
    public function resumeQemu($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/resume', null, 'POST');
    }
    public function deleteQemu($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid, null, 'DELETE');
    }
    public function createQemu($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu', $data, 'POST');
    }
public function updateQemu($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/config', $data, 'PUT');
    }
    public function getQemuSnapshot($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot', null, 'GET');
    }
    public function createQemuSnapshot($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot', $data, 'POST');
    }
    public function getQemuSnapshotConfig($vmid, $snapname)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/'.$snapname.'/config', null, 'GET');
    }
    public function deleteQemuSnapshot($vmid, $snapname)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/'.$snapname, null, 'DELETE');
    }
    public function rollbackQemuSnapshot($vmid, $snapname)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/'.$snapname.'/rollback', null, 'POST');
    }
    public function getQemuSnapshotState($vmid, $snapname)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/'.$snapname.'/state', null, 'GET');
    }
    public function getQemuSnapshotConfigCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/config', null, 'GET');
    }
    public function updateQemuSnapshotConfigCurrent($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/config', $data, 'PUT');
    }
    public function getQemuSnapshotStateCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/state', null, 'GET');
    }
    public function getQemuSnapshotSchedule($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule', null, 'GET');
    }
    public function createQemuSnapshotSchedule($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule', $data, 'POST');
    }
    public function getQemuSnapshotScheduleConfig($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid, null, 'GET');
    }
    public function deleteQemuSnapshotSchedule($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid, null, 'DELETE');
    }
    public function updateQemuSnapshotSchedule($vmid, $schedid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid, $data, 'PUT');
    }
    public function getQemuSnapshotScheduleState($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/state', null, 'GET');
    }
    public function getQemuSnapshotScheduleNextRun($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/next', null, 'GET');
    }
    public function getQemuSnapshotScheduleConfigCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/config', null, 'GET');
    }
    public function updateQemuSnapshotScheduleConfigCurrent($vmid, $data)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/config', $data, 'PUT');
    }
    public function getQemuSnapshotScheduleStateCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/state', null, 'GET');
    }
    public function getQemuSnapshotScheduleNextRunCurrent($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/next', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatus($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/status', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrent()
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/snapshot/schedule/status', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVm($vmid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/status', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentBySched($schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/snapshot/schedule/'.$schedid.'/status', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVmSched($vmid, $schedid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/status', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVmSchedRun($vmid, $schedid, $runid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid, null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVmSchedRunLog($vmid, $schedid, $runid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/log', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVmSchedRunState($vmid, $schedid, $runid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVmSchedRunStateLog($vmid, $schedid, $runid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntry($vmid, $schedid, $runid, $logid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid, null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryData($vmid, $schedid, $runid, $logid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data', null, 'GET');
    }
    public function getQemuSnapshotScheduleStatusCurrentByVmSchedRunStateLogEntryDataLog($vmid, $schedid, $runid, $logid)
    {
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/schedule/'.$schedid.'/status/'.$runid.'/state/log/'.$logid.'/data/log', null, 'GET');
    }
    public function getStatus()
    {
        $this->login();
        return Request::Request('/status', null, 'GET');
    }
    public function getTask()
    {
        $this->login();
        return Request::Request('/tasks', null, 'GET');
    }
    public function getTaskStatus($upid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/status', null, 'GET');
    }
    public function getTaskLog($upid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log', null, 'GET');
    }
    public function getTaskLogEntry($upid, $logid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid, null, 'GET');
    }
    public function getTaskLogEntryData($upid, $logid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data', null, 'GET');
    }
    public function getTaskLogEntryDataLog($upid, $logid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log', null, 'GET');
    }
    public function getTaskLogEntryDataLogEntry($upid, $logid, $logentryid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid, null, 'GET');
    }
    public function getTaskLogEntryDataLogEntryData($upid, $logid, $logentryid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid.'/data', null, 'GET');
    }
    public function getTaskLogEntryDataLogEntryDataLog($upid, $logid, $logentryid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid.'/data/log', null, 'GET');
    }
    public function getTaskLogEntryDataLogEntryDataLogEntry($upid, $logid, $logentryid, $logentrydataid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid, null, 'GET');
    }
    public function getTaskLogEntryDataLogEntryDataLogEntryData($upid, $logid, $logentryid, $logentrydataid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data', null, 'GET');
    }
    public function getTaskLogEntryDataLogEntryDataLogEntryDataLog($upid, $logid, $logentryid, $logentrydataid)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data/log', null, 'GET');
    }
    public function getTaskLogEntryDataLogEntryDataLogEntryDataLogEntry($upid, $logid, $logentryid, $logentrydataid, $logentrydata)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data/log/'.$logentrydata, null, 'GET');
    }
public function getTaskLogEntryDataLogEntryDataLogEntryDataLogEntryData($upid, $logid, $logentryid, $logentrydataid, $logentrydata)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data/log/'.$logentrydata, null, 'GET');
    }
    public function getTaskLogEntryDataLogEntryDataLogEntryDataLogEntryDataLog($upid, $logid, $logentryid, $logentrydataid, $logentrydata)
    {
        $this->login();
        return Request::Request('/tasks/'.$upid.'/log/'.$logid.'/data/log/'.$logentryid.'/data/log/'.$logentrydataid.'/data/log/'.$logentrydata.'/data/log', null, 'GET');
    }
    public function getStorage (){
        $this->login();
        return Request::Request('/storage', null, 'GET');

    }
    public function getStorageConfig($storageid){
        $this->login();
        return Request::Request('/storage/'.$storageid, null, 'GET');
    }
    public function getStorageContent($storageid){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/content', null, 'GET');
    }
    public function getStorageRRD($storageid){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd', null, 'GET');
    }
    public function getStorageRRDData($storageid){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data', null, 'GET');
    }
    public function getStorageRRDDataRRD($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname, null, 'GET');
    }
    public function getStorageRRDDataRRDData($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRD($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRDData($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd/data', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRDDataRRD($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRDDataRRDData($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRDDataRRDDataRRD($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data/rrd', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRDDataRRDDataRRDData($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data/rrd/data', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRDDataRRDDataRRDDataRRD($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data/rrd/data/rrd', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRDDataRRDDataRRDDataRRDData($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data/rrd/data/rrd/data', null, 'GET');
    }
    public function getStorageRRDDataRRDDataRRDDataRRDDataRRDDataRRDDataRRD($storageid, $rrdname){
        $this->login();
        return Request::Request('/storage/'.$storageid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data/rrd/data/rrd/data/rrd', null, 'GET');
    }
    public function getNetwork(){
        $this->login();
        return Request::Request('/network', null, 'GET');
    }
    public function getNetworkConfig($networkid){
        $this->login();
        return Request::Request('/network/'.$networkid, null, 'GET');
    }
    public function getNetworkRRD($networkid){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd', null, 'GET');
    }
    public function getNetworkRRDData($networkid){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data', null, 'GET');
    }
    public function getNetworkRRDDataRRD($networkid, $rrdname){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data/'.$rrdname, null, 'GET');
    }
    public function getNetworkRRDDataRRDData($networkid, $rrdname){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data/'.$rrdname.'/data', null, 'GET');
    }
    public function getNetworkRRDDataRRDDataRRD($networkid, $rrdname){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data/'.$rrdname.'/data/rrd', null, 'GET');
    }
    public function getNetworkRRDDataRRDDataRRDData($networkid, $rrdname){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data/'.$rrdname.'/data/rrd/data', null, 'GET');
    }
    public function getNetworkRRDDataRRDDataRRDDataRRD($networkid, $rrdname){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd', null, 'GET');
    }
    public function getNetworkRRDDataRRDDataRRDDataRRDData($networkid, $rrdname){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data', null, 'GET');
    }
    public function getNetworkRRDDataRRDDataRRDDataRRDDataRRD($networkid, $rrdname){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data/rrd', null, 'GET');
    }
    public function getNetworkRRDDataRRDDataRRDDataRRDDataRRDData($networkid, $rrdname){
        $this->login();
        return Request::Request('/network/'.$networkid.'/rrd/data/'.$rrdname.'/data/rrd/data/rrd/data/rrd/data', null, 'GET');
    }
    public function getDisks(){
        $this->login();
        return Request::Request('/nodes/pve/storage', null, 'GET');
    }
    public function getDisksConfig($storageid){
        $this->login();
        return Request::Request('/nodes/pve/storage/'.$storageid, null, 'GET');
    }
    public function getDisksContent($storageid){
        $this->login();
        return Request::Request('/nodes/pve/storage/'.$storageid.'/content', null, 'GET');
    }
    public function getDisksRRD($storageid){
        $this->login();
        return Request::Request('/nodes/pve/storage/'.$storageid.'/rrd', null, 'GET');
    }
    public function getDisksRRDData($storageid){
        $this->login();
        return Request::Request('/nodes/pve/storage/'.$storageid.'/rrd/data', null, 'GET');
    }
    public function disksList($storageid){
        $this->login();
        return Request::Request('/nodes/pve/storage/'.$storageid.'/rrd/data', null, 'GET');
    }
    public function disksListData($storageid){
        $this->login();
        return Request::Request('/nodes/pve/storage/'.$storageid.'/rrd/data/data', null, 'GET');
    }
    public function disksListDataRRD($storageid){
        $this->login();
        return Request::Request('/nodes/pve/storage/'.$storageid.'/rrd/data/data/rrd', null, 'GET');
    }
    public function qemuAgent($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent', null, 'GET');
    }
public function qemuAgentFSTrim($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent/fs-trim', null, 'POST');
    }
    public function qemuAgentFSTrimAll($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent/fs-trim-all', null, 'POST');
    }
    public function qemuAgentFSTrimAllStatus($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent/fs-trim-all/status', null, 'GET');
    }
    public function qemuAgentFSTrimStatus($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent/fs-trim/status', null, 'GET');
    }
    public function qemuAgentFSTrimStatusLog($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent/fs-trim/status/log', null, 'GET');
    }
    public function qemuAgentFSTrimStatusLogEntry($vmid, $logid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent/fs-trim/status/log/'.$logid, null, 'GET');
    }
    public function qemuAgentFSTrimStatusLogEntryData($vmid, $logid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent/fs-trim/status/log/'.$logid.'/data', null, 'GET');
    }
    public function qemuAgentFSTrimStatusLogEntryDataLog($vmid, $logid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent/fs-trim/status/log/'.$logid.'/data/log', null, 'GET');
    }
    public function getAgent($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/agent', null, 'GET');
    }
    public function qemuStatus($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/current', null, 'GET');
    }
    public function qemuStart($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/start', null, 'POST');
    }
    public function qemuStop($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/stop', null, 'POST');
    }
    public function qemuReset($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/reset', null, 'POST');
    }
    public function qemuShutdown($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/shutdown', null, 'POST');
    }
    public function qemuSuspend($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/suspend', null, 'POST');
    }
    public function qemuResume($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/status/resume', null, 'POST');
    }
    public function qemuDelete($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid, null, 'DELETE');
    }
    public function qemuCreate($vmid, $data){
        $this->login();
        return Request::Request('/nodes/pve/qemu', $data, 'POST');
    }
    public function qemuUpdate($vmid, $data){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/config', $data, 'PUT');
    }
    public function qemuSnapshot($vmid){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot', null, 'GET');
    }
    public function qemuCreateSnapshot($vmid, $data){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot', $data, 'POST');
    }
    public function qemuSnapshotConfig($vmid, $snapname){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/'.$snapname.'/config', null, 'GET');
    }
    public function qemuDeleteSnapshot($vmid, $snapname){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/'.$snapname, null, 'DELETE');
    }
    public function qemuRollbackSnapshot($vmid, $snapname){
        $this->login();
        return Request::Request('/nodes/pve/qemu/'.$vmid.'/snapshot/'.$snapname.'/rollback', null, 'POST');
    }
    public function Network($node, $type = null)
    {
        $optional['type'] = !empty($type) ? $type : null;
        return Request::Request("/nodes/$node/network", $optional);
    }
    public function NetworkConfig($node, $network)
    {
        return Request::Request("/nodes/$node/network/$network");
    }
    public function NetworkRRD($node, $network)
    {
        return Request::Request("/nodes/$node/network/$network/rrd");
    }
    public function qemuCurrent($node, $vmid)
    {
        return Request::Request("/nodes/$node/qemu/$vmid/status/current");
    }
    public function lxcStart($node, $vmid)
    {
        return Request::Request("/nodes/$node/lxc/$vmid/status/start", null, 'POST');
    }



}