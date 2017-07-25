<?php
	//最早的进程，也是父进程
	$parentPid = getmypid();
	echo '原始父进程：' . $parentPid . PHP_EOL;
	echo "<br/>";
	//创建子进程,返回子进程id
	$pid = pcntl_fork();
	if( $pid == -1 ){
		exit("fork error");
	}
	//pcntl_fork 后，父进程返回子进程id，子进程返回0
	echo 'ID : ' . $pid . PHP_EOL;
	echo "<br/>";

	if( $pid == 0 ){
		//子进程执行pcntl_fork的时候，pid总是0，并且不会再fork出新的进程
		$mypid = getmypid(); // 用getmypid()函数获取当前进程的PID
		sleep(1000);
		echo 'I am child process. My PID is ' . $mypid . ' and my fathers PID is ' . $parentPid . PHP_EOL;
		echo "<br/>";

	} else {
		//父进程fork之后，返回的就是子进程的pid号，pid不为0
		echo 'Oh my god! I am a father now! My childs PID is ' . $pid . ' and mine is ' . $parentPid . PHP_EOL;
		echo "<br/>";
		        pcntl_waitpid($pid, $status);

	}
	echo "父进程退出";
	$aa = shell_exec("ps -af | grep multiprocess.php");
	echo $aa;

//echo date('h:i:s') . "<br />";

//暂停 10 秒
//sleep(30);

//重新开始
//echo date('h:i:s');
/*      $ppid = posix_getpid();
    $pid = pcntl_fork();
			echo "我是父进程，我的id是".$pid;

    if ($pid == -1) {
        throw new Exception('fork子进程失败!');
    } elseif ($pid > 0) {
        //cli_set_process_title("我是父进程,我的进程id是{$ppid}.");
　　　　 //sleep(30); // 保持30秒，确保能被ps查到
		echo "我是父进程，我的id是".$pid;
    } else {
        $cpid = posix_getpid();
		//echo "我是子进程，我的id是".$pid;
        //cli_set_process_title("我是{$ppid}的子进程,我的进程id是{$cpid}.");
        sleep(30);
    }  */
?>