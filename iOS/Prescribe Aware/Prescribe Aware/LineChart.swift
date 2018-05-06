//
//  CubicChart.swift
//  Prescribe Aware
//
//  Created by Stephen Sowole on 5/6/18.
//  Copyright © 2018 HackHLTH. All rights reserved.
//

import UIKit
import Charts

public protocol GetChartData {
    func getChartData(with dataPoints: [String], values: [String])
    var dataPoints: [String] { get }
    var values: [String] { get }
}

class LineChart: UIView {

    let lineChartView = LineChartView()
    var lineDataEntry: [ChartDataEntry] = []

    var dataPoints = [String]()
    var values = [String]()

    let name: String
    let color: UIColor

    init(name: String, color: UIColor) {
        self.name = name
        self.color = color
        super.init(frame: .zero)
    }

    required init?(coder aDecoder: NSCoder) {
        fatalError("init(coder:) has not been implemented")
    }

    var delegate: GetChartData! {
        didSet {
            populateData()
            lineChartSetup()
        }
    }

    func populateData() {
        dataPoints = delegate.dataPoints
        values = delegate.values
    }

    func lineChartSetup() {

        backgroundColor = .white
        addSubview(lineChartView)

        lineChartView.translatesAutoresizingMaskIntoConstraints = false
        lineChartView.topAnchor.constraint(equalTo: topAnchor, constant: 20).isActive = true
        lineChartView.bottomAnchor.constraint(equalTo: bottomAnchor).isActive = true
        lineChartView.leadingAnchor.constraint(equalTo: leadingAnchor).isActive = true
        lineChartView.trailingAnchor.constraint(equalTo: trailingAnchor).isActive = true

        lineChartView.animate(xAxisDuration: 2.0, yAxisDuration: 2.0, easingOption: .easeInSine)

        setLineChart(dataPoints: dataPoints, values: values)
    }

    func setLineChart(dataPoints: [String], values: [String]) {
        lineChartView.noDataTextColor = .white
        lineChartView.noDataText = "No data for the chart."
        lineChartView.backgroundColor = .white


        for i in 0..<dataPoints.count {
            let dataPoint = ChartDataEntry(x: Double(i), y: Double(values[i])!)
            lineDataEntry.append(dataPoint)
        }

        let chartDataSet = LineChartDataSet(values: lineDataEntry, label: name)
        let chartData = LineChartData()
        chartData.addDataSet(chartDataSet)
        chartData.setDrawValues(true)
        chartDataSet.colors = [color]
        chartDataSet.setCircleColor(color)
        chartDataSet.circleHoleColor = color
        chartDataSet.circleRadius = 4.0

        let gradientColors = [color.cgColor, UIColor.clear.cgColor] as CFArray
        let colorLocations: [CGFloat] = [1.0, 0.0]
        guard let gradient = CGGradient(colorsSpace: CGColorSpaceCreateDeviceRGB(), colors: gradientColors, locations: colorLocations) else {
            return
        }
        chartDataSet.fill = Fill.fillWithLinearGradient(gradient, angle: 90.0)
        chartDataSet.drawFilledEnabled = true

        let formatter : ChartFormatter = ChartFormatter()
        formatter.setValues(values: dataPoints)
        let xaxis: XAxis = XAxis()
        xaxis.valueFormatter = formatter

        lineChartView.xAxis.labelPosition = .bottom
        lineChartView.xAxis.drawGridLinesEnabled = false
        lineChartView.xAxis.valueFormatter = xaxis.valueFormatter
        lineChartView.chartDescription?.enabled = false
        lineChartView.legend.enabled = true
        lineChartView.rightAxis.enabled = false
        lineChartView.leftAxis.drawLabelsEnabled = true
        lineChartView.leftAxis.drawGridLinesEnabled = false

        lineChartView.data = chartData
    }
}

public class ChartFormatter: NSObject, IAxisValueFormatter {

    var dataPoints = [String]()

    public func stringForValue(_ value: Double, axis: AxisBase?) -> String {
        return dataPoints[Int(value)]
    }

    public func setValues(values: [String]) {
        self.dataPoints = values
    }
}
