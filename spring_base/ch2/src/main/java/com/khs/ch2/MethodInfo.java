package com.khs.ch2;

import java.lang.reflect.Method;
import java.lang.reflect.Parameter;
import java.util.StringJoiner;

public class MethodInfo {
	public static void main(String[] args) throws Exception{

		// 객체 생성
		Class clazz = Class.forName("com.khs.ch2.YoilTellerMVC");
		Object obj = clazz.newInstance();
		
		// 메서드 가져와서 배열 저장
		Method[] methodArr = clazz.getDeclaredMethods();
		
		for(Method m : methodArr) {
			String name = m.getName();
			Parameter[] paramArr = m.getParameters();
//			Class[] paramTypeArr = m.getParameterTypes();
			Class returnType = m.getReturnType();
			
			StringJoiner paramList = new StringJoiner(", ", "(", ")");
			
			for(Parameter param : paramArr) {
				String paramName = param.getName();
				Class  paramType = param.getType();
				
				paramList.add(paramType.getName() + " " + paramName);
			}
			
			System.out.printf("%s %s%s%n", returnType.getName(), name, paramList);
		}
	} // main
}