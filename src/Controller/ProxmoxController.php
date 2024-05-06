<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\ProxmoxService;

class ProxmoxController extends AbstractController
{
    private ProxmoxService $proxmoxService;

    public function __construct(ProxmoxService $proxmoxService)
    {
        $this->proxmoxService = $proxmoxService;
    }

    #[Route('/proxmox', name: 'app_proxmox')]
    public function index(): Response
    {
        $nodes = $this->proxmoxService->getNodes();
        $qemu = $this->proxmoxService->getQemu();
        $storage = $this->proxmoxService->getStorage();
        $network = $this->proxmoxService->getNetwork();
        $disks = $this->proxmoxService->getDisks();
        $qemuStatus = $this->proxmoxService->qemuStatus(100);
        $qemuCurrent = $this->proxmoxService->qemuCurrent('pve',100);
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'ProxmoxController',
            'nodes' => $nodes,
            'qemu' => $qemu,
            'storage' => $storage,
            'network' => $network,
            'disks' => $disks,
            'qemuStatus' => $qemuStatus,
            'qemuCurrent' => $qemuCurrent,


        ]);
    }
}