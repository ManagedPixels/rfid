class CreateAttendances < ActiveRecord::Migration
  def change
    create_table :attendances do |t|
      t.references :attendee, index: true
      t.references :workshop, index: true
      t.datetime :swipe_time
      t.string :status

      t.timestamps
    end
  end
end
