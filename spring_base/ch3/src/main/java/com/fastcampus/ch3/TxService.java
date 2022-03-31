package com.fastcampus.ch3;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.datasource.DataSourceTransactionManager;
import org.springframework.stereotype.Service;
import org.springframework.transaction.PlatformTransactionManager;
import org.springframework.transaction.TransactionDefinition;
import org.springframework.transaction.TransactionStatus;
import org.springframework.transaction.annotation.Propagation;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.transaction.support.DefaultTransactionDefinition;

import javax.sql.DataSource;

@Service
public class TxService {
    @Autowired A1Doa a1Doa;
    @Autowired B1Doa b1Doa;

    @Autowired
    DataSource ds;

    //@Transactional(propagation = Propagation.REQUIRED, rollbackFor = Exception.class)
    public void insertA1WithTx() throws Exception {
        PlatformTransactionManager tm = new DataSourceTransactionManager(ds);
        DefaultTransactionDefinition txd = new DefaultTransactionDefinition();
        txd.setPropagationBehavior(TransactionDefinition.PROPAGATION_REQUIRED);
        TransactionStatus status = tm.getTransaction(txd);

        try {
            a1Doa.insert(1,100);
            insertB1WithTx();
            a1Doa.insert(2,100);
            tm.commit(status);
        } catch (Exception e) {
            e.printStackTrace();
            tm.rollback(status);
        }
    }

    //@Transactional(propagation = Propagation.REQUIRED)
    public void insertB1WithTx() throws Exception{
        PlatformTransactionManager tm = new DataSourceTransactionManager(ds);
        DefaultTransactionDefinition txd = new DefaultTransactionDefinition();
        txd.setPropagationBehavior(TransactionDefinition.PROPAGATION_REQUIRES_NEW);
        TransactionStatus status = tm.getTransaction(txd);

        try {
            b1Doa.insert(1, 200);
            b1Doa.insert(2, 200);
            tm.commit(status);
        } catch (Exception e) {
            e.printStackTrace();
            tm.rollback(status);
        }
    }

    public void insertA1WithoutTx() throws Exception {
        a1Doa.insert(1,100);
        a1Doa.insert(1,200);
    }

    //@Transactional(rollbackFor = Exception.class) // Exception과 그 자손들 rollback
    //@Transactional - RuntimeException, Error만  rollback
    public void insertA1WithTxFail() throws Exception {
        a1Doa.insert(1,100);
        a1Doa.insert(1,200);
    }

    //@Transactional
    public void insertA1WithTxSuccess() throws Exception {
        a1Doa.insert(1,100);
        a1Doa.insert(2,200);
    }

    public void deleteA1() throws Exception {
        a1Doa.delteAll();
    }

    public void deleteB1() throws Exception {
        b1Doa.delteAll();
    }
}
