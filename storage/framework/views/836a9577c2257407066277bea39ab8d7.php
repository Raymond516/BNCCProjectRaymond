

<?php $__env->startSection('title', 'Daftar Karyawan'); ?>

<?php $__env->startSection('content'); ?>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Karyawan</h5>
        <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary">
            + Tambah Karyawan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($employee->name); ?></td>
                        <td><?php echo e($employee->age); ?></td>
                        <td><?php echo e($employee->address); ?></td>
                        <td><?php echo e($employee->phone); ?></td>
                        <td>
                            <a href="<?php echo e(route('employees.edit', $employee->id)); ?>" 
                               class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?php echo e(route('employees.destroy', $employee->id)); ?>" 
                                  method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Raymond gunawan\Documents\folder kuliah Binus\CODING\BNCC Pertemuan\BNCC Project\banana-cat\resources\views/employees/index.blade.php ENDPATH**/ ?>