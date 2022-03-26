package com.fastcampus.ch3.aop;

import org.aspectj.lang.ProceedingJoinPoint;
import org.aspectj.lang.annotation.Around;
import org.aspectj.lang.annotation.Aspect;
import org.springframework.stereotype.Component;

import java.util.Arrays;

@Component
@Aspect
public class LoggingAdvice {
    @Around("execution(* com.fastcampus.ch3.aop.MyMath.*(..))")  //pointcut - 부가기능이 적용될 패턴
    //@Before(value = "execution(* com.fastcampus.ch3.aop.MyMath.*(..))")  //pointcut - 부가기능이 적용될 패턴
    public Object methodCallLog(ProceedingJoinPoint pjp) throws Throwable {
        long start = System.currentTimeMillis();
        System.out.println("<<[start] "+pjp.getSignature().getName()+ Arrays.toString(pjp.getArgs()));

        //타겟의 메서드 호출
        Object result = pjp.proceed();

        System.out.println("result = " + result);
        System.out.println("[end]>> "+ (System.currentTimeMillis()-start)+"ms");

        return result;
    }
}
